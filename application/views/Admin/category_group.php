<?php
include VIEWPATH .'./admin/components/header.php';
include VIEWPATH .'./admin/components/sidebar.php';
?>
<style>
/* Import Google font - Poppins */
/* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} */

.list-container {
    /* width: 300px; */
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 16px;
}

.draggable-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.draggable-list li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 16px;
    margin-bottom: 8px;
    background: #eaeaea;
    border-radius: 4px;
    cursor: grab;
}

.draggable-list li.dragging {
    background: #cce5ff;
    opacity: 0.8;
    cursor: grabbing;
}

.draggable-list li:last-child {
    margin-bottom: 0;
}

button {
    background: #007bff;
    border: none;
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 5px;
    font-size: 14px;
}

button:hover {
    background: #0056b3;
}

button:disabled {
    background: #c0c0c0;
    cursor: not-allowed;
}
</style>

<div class="main-panel">
    <div class="content-wrapper">

    <div class="card card-body d-flex flex-row justify-content-between align-items-center">
            <h3>Category Order</h3>
            <button class="btn btn-primary" id="btn-save-order">Save</button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($grouped_data)) { ?>
                                <div class="list-container">
                                    <ul id="list" class="draggable-list">
                                        <?php foreach ($grouped_data as $category_name => $category_info) { ?>
                                        <li draggable="true" data-category-id="<?=$category_info['category_id']?>"
                                            class="order-item">
                                            <?=$category_name;?>
                                            <div>
                                            <button class="up-btn"><i class="bi bi-arrow-up"></i></button>
                                            <button class="down-btn"><i class="bi bi-arrow-down"></i></button>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php } else { ?>
                                <p>No categories or templates found.</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const list = document.getElementById("list");
        let draggedItem = null;

        // Drag and Drop
        list.addEventListener("dragstart", (event) => {
            draggedItem = event.target;
            draggedItem.classList.add("dragging");
        });

        list.addEventListener("dragend", (event) => {
            draggedItem.classList.remove("dragging");
            draggedItem = null;
        });

        list.addEventListener("dragover", (event) => {
            event.preventDefault();
            const afterElement = getDragAfterElement(list, event.clientY);
            if (afterElement == null) {
                list.appendChild(draggedItem);
            } else {
                list.insertBefore(draggedItem, afterElement);
            }
        });

        function getDragAfterElement(container, y) {
            const draggableElements = [
                ...container.querySelectorAll("li:not(.dragging)"),
            ];

            return draggableElements.reduce(
                (closest, child) => {
                    const box = child.getBoundingClientRect();
                    const offset = y - box.top - box.height / 2;
                    if (offset < 0 && offset > closest.offset) {
                        return {
                            offset,
                            element: child
                        };
                    } else {
                        return closest;
                    }
                }, {
                    offset: Number.NEGATIVE_INFINITY
                }
            ).element;
        }

        // Up and Down Buttons
        list.addEventListener("click", (event) => {
            if (event.target.tagName === "BUTTON") {
                const button = event.target;
                const listItem = button.parentElement.parentElement;

                if (button.classList.contains("up-btn")) {
                    moveUp(listItem);
                } else if (button.classList.contains("down-btn")) {
                    moveDown(listItem);
                }
            }
        });

        function moveUp(item) {
            const prev = item.previousElementSibling;
            if (prev) {
                item.parentElement.insertBefore(item, prev);
            }
        }

        function moveDown(item) {
            const next = item.nextElementSibling;
            if (next) {
                item.parentElement.insertBefore(next, item);
            }
        }
    });

    $('#btn-save-order').on('click', function() {
        var list = document.querySelectorAll('.order-item');
        var setOrder = [];
        var order;
        list.forEach((item, index) => {
            order = index;
            var categoryId = $(item).data('category-id'); // Convert `item` to a jQuery object
            setOrder.push({
                categoryId: categoryId,
                order: order
            }); // Correct object syntax
        });
        $.ajax({
            url: '<?=base_url('set-category-order')?>', // Replace with your actual URL
            method: 'POST', // Use the appropriate HTTP method
            data: JSON.stringify(setOrder), // Convert to JSON if required by the backend
            contentType: 'application/json', // Set content type to JSON
            success: function(data) {
                var result = JSON.parse(data)
                if (result.status == 'success') {
                    swal('success', result.message, 'success', );
                } else {
                    swal('error', 'Failed To Update...!');
                }

            },
            error: function(err) {
                console.error('Error updating category order:', err);
            }
        });
    });
    </script>
    <?php include VIEWPATH .'./admin/components/footer.php';?>