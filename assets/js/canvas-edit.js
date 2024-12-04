

// Initialize Fabric.js canvas
const canvas = new fabric.Canvas('canvas', {
  preserveObjectStacking: true
});



// Define reusable shapes configuration
const shapeDefinitions = {
  rectangle: () => new fabric.Rect({
    left: 50,
    top: 50,
    fill: 'red',
    width: 100,
    height: 50,
  }),
  circle: () => new fabric.Circle({
    left: 150,
    top: 100,
    fill: 'blue',
    radius: 50,
  }),
  triangle: () => new fabric.Triangle({
    left: 250,
    top: 150,
    fill: 'green',
    width: 100,
    height: 100,
  }),
  line: () => new fabric.Line([50, 200, 200, 200], {
    stroke: 'black',
    strokeWidth: 5,
  }),
  polygon: () => new fabric.Polygon([
    { x: 200, y: 10 },
    { x: 250, y: 50 },
    { x: 200, y: 100 },
    { x: 150, y: 50 },
  ], {
    fill: 'purple',
    left: 100,
    top: 100,
  }),
  star: () => new fabric.Polygon([
    { x: 75, y: 0 },
    { x: 100, y: 50 },
    { x: 150, y: 50 },
    { x: 112.5, y: 75 },
    { x: 125, y: 125 },
    { x: 75, y: 100 },
    { x: 25, y: 125 },
    { x: 37.5, y: 75 },
    { x: 0, y: 50 },
    { x: 50, y: 50 },
  ], {
    fill: 'gold',
    left: 100,
    top: 100,
  }),
  pentagon: () => new fabric.Polygon([
    { x: 50, y: 0 },
    { x: 100, y: 35 },
    { x: 80, y: 100 },
    { x: 20, y: 100 },
    { x: 0, y: 35 },
  ], {
    fill: 'cyan',
    left: 200,
    top: 100,
  }),
  hexagon: () => new fabric.Polygon([
    { x: 50, y: 0 },
    { x: 100, y: 25 },
    { x: 100, y: 75 },
    { x: 50, y: 100 },
    { x: 0, y: 75 },
    { x: 0, y: 25 },
  ], {
    fill: 'limegreen',
    left: 300,
    top: 100,
  }),
};

// Handle shape addition based on button click
$('.btn-shape').on('click', function () {
  const shapeType = $(this).data('shape');
  const createShape = shapeDefinitions[shapeType];

  if (createShape) {
    const shape = createShape();
    canvas.add(shape);
    canvas.setActiveObject(shape);
  } else {
    console.warn(`Shape type "${shapeType}" is not defined.`);
  }
});




// Add Text Button
document.getElementById('add-text').addEventListener('click', function () {
  const text = new fabric.Textbox('Edit me!', {
    left: 100,
    top: 100,
    fontSize: 24,
    fill: '#000',
    fontFamily: 'Arial',
    textAlign: 'left'
  });
  canvas.add(text);
  canvas.setActiveObject(text);
});

// Image Upload
document.getElementById('upload-image').addEventListener('change', function (e) {
  const reader = new FileReader();
  reader.onload = function (event) {
    fabric.Image.fromURL(event.target.result, function (img) {
      img.scale(0.5);
      canvas.add(img);
      canvas.setActiveObject(img);
    });
  };
  reader.readAsDataURL(e.target.files[0]);
});

// Change Object Color
// document.getElementById('object-color').addEventListener('input', function () {
//   const activeObject = canvas.getActiveObject();
//   if (activeObject) {
//     activeObject.set('fill', this.value);
//     canvas.renderAll();
//   }
// });
$(document).on('input', '.object-color-input', function () {
  const activeObject = canvas.getActiveObject();
  if (activeObject) {
    activeObject.set('fill', this.value);
    canvas.renderAll();
  }
});

// Update Font Properties for Text Objects
function updateTextProperty(property, value) {
  const activeObject = canvas.getActiveObject();
  if (activeObject && activeObject.type === 'textbox') {
    activeObject.set(property, value);
    canvas.renderAll();
  }
}

// Load the selected font using WebFontLoader and apply it
document.getElementById('font-select').addEventListener('change', function () {
  var selectedFont = this.value;

  // Load the selected font using WebFontLoader
  WebFont.load({
    google: {
      families: [selectedFont] // Load the selected font from Google Fonts
    },
    active: function () {
      // Apply the font to the active textbox
      updateTextProperty('fontFamily', selectedFont);
    }
  });
});
document.getElementById('font-size').addEventListener('input', function () {
  updateTextProperty('fontSize', parseInt(this.value, 10));
});

// Load Template
// document.querySelectorAll('.btn-load-template').forEach(image => {
//   image.addEventListener('click', function () {
//     const templateId = this.getAttribute('data-id');
//     const selectedTemplate = templates[templateId - 1];

//     if (!localStorage.getItem('business_name')) {
//       profileModal.show();
//     } else {
//       canvas.loadFromJSON(selectedTemplate, updateData);
//     }
//   });
// });

// Export Image
document.getElementById('export-image').addEventListener('click', function () {
  const format = 'png';
  const scale = 4;
  const dataURL = canvas.toDataURL({
    format: format,
    multiplier: scale
  });

  const link = document.createElement('a');
  link.href = dataURL;
  link.download = `canvas-design.${format}`;
  link.click();
});

// Load User Data from LocalStorage
const userData = {
  business_name: localStorage.getItem('business_name'),
  phone_no: localStorage.getItem('mobile_no'),
  address: localStorage.getItem('address'),
  appLogo: localStorage.getItem('logo')
};

if (userData.business_name) {
  document.getElementById('business_name').value = userData.business_name;
  document.getElementById('mobile_no').value = userData.phone_no;
  document.getElementById('address').value = userData.address;
}

// Update Canvas with User Data
function updateData() {
  const updateObject = (id, value) => {
    const obj = canvas.getObjects().find(obj => obj.id === id);
    if (obj) obj.set('text', value);
  };

  updateObject('phone_no', userData.phone_no);
  updateObject('business_name', userData.business_name);

  const appLogo = canvas.getObjects().find(obj => obj.id === 'appLogo');
  if (appLogo && userData.appLogo) {
    fabric.Image.fromURL(userData.appLogo, function (img) {
      img.set({ height: 60, width: 60 });
      appLogo.setElement(img.getElement());
      canvas.renderAll();
    });
  } else {
    canvas.renderAll();
  }
}





// liyer management 
let draggedLayerIndex = null; // To store the index of the dragged item 
function updateLayerPanel() {
  const layerList = document.getElementById('layer-list');
  layerList.innerHTML = ''; // Clear the current list

  console.log('select elemenent')
  canvas.getObjects().forEach((obj, index) => {
    const layerItem = document.createElement('div');
    layerItem.className = 'layer-item';
    layerItem.draggable = true; // Make the item draggable
    layerItem.setAttribute('data-index', index); // Store index in data attribute

    // Create an img element for the thumbnail
    const thumbnail = new Image();
    thumbnail.src = obj.toDataURL(); // Get thumbnail as data URL
    thumbnail.alt = obj.type; // Alternative text for the image
    thumbnail.style.height = "40px";
    thumbnail.style.maxWidth = "100px";
    thumbnail.style.margin = "5px auto";
    thumbnail.style.display = "block";



    layerItem.appendChild(thumbnail); // Append thumbnail to layer item
    layerItem.innerHTML += `${obj.type}`; // Add layer type text after thumbnail


    // layerItem.innerHTML = `${index + 1}: ${obj.type}`;

    // Highlight selected object
    if (obj === canvas.getActiveObject()) {
      layerItem.classList.add('selected-layer');
    }

    // Drag events for drag-and-drop reordering
    layerItem.addEventListener('dragstart', handleDragStart);
    layerItem.addEventListener('dragover', handleDragOver);
    layerItem.addEventListener('drop', handleDrop);
    layerItem.addEventListener('dragend', handleDragEnd);

    // Click event to select object from layer panel
    layerItem.addEventListener('click', function () {
      canvas.setActiveObject(obj);
      canvas.renderAll();
      updateLayerPanel(); // Update the panel after selection
    });

    layerList.appendChild(layerItem);
  });
}

// Drag and Drop Handlers

function handleDragStart(event) {
  draggedLayerIndex = event.target.getAttribute('data-index');
  event.target.classList.add('dragging');
}

function handleDragOver(event) {
  event.preventDefault(); // Allow drop
  event.target.classList.add('drag-over');
}

function handleDrop(event) {
  event.preventDefault();
  const targetLayerIndex = event.target.getAttribute('data-index');

  if (draggedLayerIndex !== null && targetLayerIndex !== null && draggedLayerIndex !== targetLayerIndex) {
    reorderLayers(draggedLayerIndex, targetLayerIndex);
  }

  event.target.classList.remove('drag-over');
}

function handleDragEnd(event) {
  event.target.classList.remove('dragging');
}

// Reorder layers on canvas based on drag-and-drop
function reorderLayers(draggedIndex, targetIndex) {
  const objects = canvas.getObjects();
  const draggedObject = objects[draggedIndex];

  // Remove dragged object and reinsert it at the new position
  objects.splice(draggedIndex, 1);
  objects.splice(targetIndex, 0, draggedObject);

  // Re-render canvas with reordered objects
  canvas.clear();
  objects.forEach(obj => canvas.add(obj));
  canvas.renderAll();

  // Update layer panel after reordering
  updateLayerPanel();
}

// Update layer panel when object is selected
canvas.on('object:selected', updateLayerPanel);

// Update layer panel when object is modified
canvas.on('object:modified', updateLayerPanel);

// Update layer panel when object is added
canvas.on('object:added', updateLayerPanel);

// Clear selection when canvas is clicked
canvas.on('selection:cleared', updateLayerPanel);


document.getElementById('align-left').addEventListener('click', function () {
  updateTextProperty('textAlign', 'left')
});
document.getElementById('align-center').addEventListener('click', function () {
  updateTextProperty('textAlign', 'center')
});
document.getElementById('align-right').addEventListener('click', function () {
  updateTextProperty('textAlign', 'right')
});



// delete leyer feature 
function deleteSelectedObject() {
  const activeObject = canvas.getActiveObject();
  if (activeObject) {
    canvas.remove(activeObject);
  }
}

document.addEventListener('keydown', (event) => {
  if (event.key === 'Delete') {
    deleteSelectedObject();
  }
});

// load selected object color in color pickcer  
canvas.on('selection:created', function (event) {
  const selectedObject = event.selected[0];
  console.log(selectedObject)
  if (selectedObject.fill) {
    $('.object-color-input').val(selectedObject.fill);
    console.log('object color0', selectedObject.fill);
  }
});

// Update when another object is selected
canvas.on('selection:updated', function (event) {
  const selectedObject = event.selected[0];
  console.log(selectedObject)
  if (selectedObject.fill) {
    $('.object-color-input').val(selectedObject.fill);
    console.log('object color0', selectedObject.fill);
  }
});

// Handle deselection
canvas.on('selection:cleared', function () {
  console.log(selectedObject)
  if (selectedObject.fill) {
    $('.object-color-input').val(selectedObject.fill);
    console.log('object color0', selectedObject.fill);
  }
});


// Create an input element for ID editing
const idInput = document.getElementById('idInput');
let selectedObject = null;

// Handle right-click event (contextmenu) on the canvas
canvas.upperCanvasEl.addEventListener('contextmenu', (e) => {
  e.preventDefault(); // Prevent the default right-click menu

  // Get the object under the pointer
  const pointer = canvas.getPointer(e);
  const target = canvas.findTarget(e);

  if (target) {
    selectedObject = target;

    // Show the input box at the pointer position
    idInput.style.left = `${e.pageX}px`;
    idInput.style.top = `${e.pageY}px`;
    idInput.style.display = 'block';

    // Pre-fill the input with the current ID, if available
    idInput.value = target.id || '';
    idInput.focus();
  }
});

// Save the ID when the user presses Enter
idInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && selectedObject) {
    // Set the ID on the selected object
    selectedObject.set('id', idInput.value);
    console.log(`Object ID updated: ${selectedObject.id}`);

    // Hide the input box
    idInput.style.display = 'none';
    idInput.value = '';
    selectedObject = null;

    // Re-render the canvas
    canvas.renderAll();
  }
});

// Hide the input box when clicking outside
canvas.on('mouse:down', () => {
  if (idInput.style.display === 'block') {
    idInput.style.display = 'none';
    selectedObject = null;
  }
});

// Extend Fabric.js to include custom properties (e.g., id) in serialization
fabric.Object.prototype.toObject = (function (toObject) {
  return function () {
      return fabric.util.object.extend(toObject.call(this), {
          id: this.id || null, // Include the custom `id` property
      });
  };
})(fabric.Object.prototype.toObject);