// Initialize Fabric.js canvas
const canvas = new fabric.Canvas('canvas', {
  preserveObjectStacking: true,
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
    textAlign: 'left',
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
$(document).on('input', '.object-color-input', function () {
  const activeObject = canvas.getActiveObject();
  if (activeObject) {
    activeObject.set('fill', this.value);
    canvas.renderAll();
  }
});

document.getElementById('align-left').addEventListener('click', function () {
  updateTextProperty('textAlign', 'left')
});
document.getElementById('align-center').addEventListener('click', function () {
  updateTextProperty('textAlign', 'center')
});
document.getElementById('align-right').addEventListener('click', function () {
  updateTextProperty('textAlign', 'right')
});

// Update Font Properties for Text Objects
function updateTextProperty(property, value) {
  const activeObject = canvas.getActiveObject();
  if (activeObject && activeObject.type === 'textbox') {
    activeObject.set(property, value);
    canvas.renderAll();
  }
}

// Load and Apply Font
document.getElementById('font-select').addEventListener('change', function () {
  const selectedFont = this.value;

  WebFont.load({
    google: { families: [selectedFont] },
    active: () => updateTextProperty('fontFamily', selectedFont),
  });
});

document.getElementById('font-size').addEventListener('input', function () {
  updateTextProperty('fontSize', parseInt(this.value, 10));
});

// Export Image
document.getElementById('export-image').addEventListener('click', function () {
  const format = 'png';
  const scale = 4;
  const dataURL = canvas.toDataURL({ format, multiplier: scale });

  const link = document.createElement('a');
  link.href = dataURL;
  link.download = `canvas-design.${format}`;
  link.click();
});

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

// Delete Selected Object
document.addEventListener('keydown', (event) => {
  if (event.key === 'Delete') {
    const activeObject = canvas.getActiveObject();
    if (activeObject) canvas.remove(activeObject);
  }
});

// Extend Fabric.js to include custom properties
fabric.Object.prototype.toObject = (function (toObject) {
  return function (propertiesToInclude) {
    return fabric.util.object.extend(toObject.call(this, propertiesToInclude), {
      id: this.id || null,
    });
  };
})(fabric.Object.prototype.toObject);

// Reference the input element for editing object IDs
const idInput = document.getElementById('idInput');
let selectedObject = null;

// Add context menu event listener to the canvas
canvas.upperCanvasEl.addEventListener('contextmenu', (e) => {
  e.preventDefault(); // Prevent the default browser context menu

  // Find the object under the pointer
  const target = canvas.findTarget(e);

  if (target) {
    selectedObject = target; // Set the selected object

    // Position the input box near the right-click location
    const inputLeft = Math.min(e.pageX, window.innerWidth - idInput.offsetWidth);
    const inputTop = Math.min(e.pageY, window.innerHeight - idInput.offsetHeight);

    // Show and position the input box
    idInput.style.left = `${inputLeft}px`;
    idInput.style.top = `${inputTop}px`;
    idInput.style.display = 'block';

    // Pre-fill the input with the current ID
    idInput.value = target.id || '';
    idInput.focus();
  } else {
    // Hide the input box if no object is selected
    idInput.style.display = 'none';
  }
});

// Save the ID when pressing Enter
idInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && selectedObject) {
    selectedObject.set('id', idInput.value); // Set the ID
    console.log(`Object ID updated: ${selectedObject.id}`);

    idInput.style.display = 'none'; // Hide the input box
    idInput.value = '';
    selectedObject = null;
    canvas.renderAll(); // Re-render the canvas
  }
});

// Hide the input box when clicking outside
document.addEventListener('click', (e) => {
  if (idInput.style.display === 'block' && !idInput.contains(e.target)) {
    idInput.style.display = 'none';
    selectedObject = null;
  }
});


// Load User Data from LocalStorage
const userData = {
  business_name: localStorage.getItem('business_name') || "Jagdamba Infotech",
  phone_no: localStorage.getItem('mobile_no') || "9168585280",
  address: localStorage.getItem('address') || "At post Chitegaon",
  appLogo: localStorage.getItem('logo')
};

// if (userData.business_name) {
//   document.getElementById('business_name').value = userData.business_name;
//   document.getElementById('mobile_no').value = userData.phone_no;
//   document.getElementById('address').value = userData.address;
// }

// Update Canvas with User Data
function setUserData() {
  const updateObject = (id, value) => {
    const obj = canvas.getObjects().find(obj => obj.id === id);
    if (obj) obj.set('text', value);
  };

  updateObject('phone_no', userData.phone_no);
  updateObject('business_name', userData.business_name);
  updateObject('address', userData.address);


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


// Profile Form Submission
// document.getElementById('profileForm').addEventListener('submit', function (e) {
//   e.preventDefault();
//   const formData = new FormData(this);
//   const logo = formData.get('logo');

//   if (logo && logo.type.startsWith('image/')) {
//     const reader = new FileReader();
//     reader.onloadend = function () {
//       localStorage.setItem('logo', reader.result);
//       document.getElementById('logoPreview').src = reader.result;
//     };
//     reader.readAsDataURL(logo);
//   }

//   localStorage.setItem('business_name', formData.get('business_name'));
//   localStorage.setItem('mobile_no', formData.get('mobile_no'));
//   localStorage.setItem('address', formData.get('address'));

//   if (confirm('Data saved to local storage! Would you like to proceed?')) {
//     location.reload();
//   } else {
//     alert('You chose not to proceed.');
//   }
// });

fabric.util.loadFonts = function (canvas) {
  canvas.getObjects().forEach(obj => {
    if (obj.type === 'textbox' && obj.fontFamily) {
      const fontFamily = obj.fontFamily;
      obj.fontFamily = ''; // Reset font to force re-rendering
      obj.fontFamily = fontFamily;
    }
  });
  canvas.renderAll();
};

// Example: Call after font is loaded
fabric.util.loadFonts(canvas);
