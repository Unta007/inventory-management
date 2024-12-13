
<div class="d-flex">
    <a href="<?php echo e(route('beverages.edit', ['beverage' => $beverage->id])); ?>"
        class="btn btn-custom-yellow btn-sm me-2">
        <i class="bi-pencil-square"></i> Edit
    </a>
    <div>
        <form id="deleteForm" action="<?php echo e(route('beverages.destroy', ['beverage' => $beverage->id])); ?>"
            method="POST" onsubmit="return showModal(event);">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <button type="submit" class="btn btn-custom-red btn-sm me-2">
                <i class="bi-trash"></i> Delete
            </button>
        </form>
    </div>
</div>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <h3>Confirm Deletion</h3>
        <p>Are you sure you want to delete this item?</p>
        <button id="confirmDelete" class="btn btn-danger btn-confirm">Yes, Delete</button>
        <button id="cancelDelete" class="btn btn-secondary btn-cancel">Cancel</button>
    </div>
</div>

<script>
    function showModal(event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('confirmationModal').style.display = 'block'; // Show modal
    }

    document.getElementById('confirmDelete').onclick = function() {
        document.getElementById('deleteForm').submit(); // Submit the form
    };

    document.getElementById('cancelDelete').onclick = function() {
        document.getElementById('confirmationModal').style.display = 'none'; // Hide modal
    };
</script>
<?php /**PATH C:\Users\fauzan\inventory-management\resources\views/beverage/actions.blade.php ENDPATH**/ ?>