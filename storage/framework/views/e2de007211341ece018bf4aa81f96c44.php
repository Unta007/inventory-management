<nav>
    <div class="d-flex justify-content-center pagination-page">
        <select id="pageSelect" class="form-select" aria-label="Page selection">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($url); ?>" <?php echo e($page == $paginator->currentPage() ? 'selected' : ''); ?>>
                            Page <?php echo e($page); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</nav>

<script>
    document.getElementById('pageSelect').addEventListener('change', function() {
        const selectedUrl = this.value;
        if (selectedUrl) {
            window.location.href = selectedUrl + '&per_page=' + <?php echo e(request('per_page', 5)); ?>;
        }
    });
</script>
<?php /**PATH C:\Users\fauzan\inventory-management\resources\views/vendor/pagination/bootstrap-5.blade.php ENDPATH**/ ?>