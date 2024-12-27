<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-link" id="sidebar-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <a href="<?php echo e(route('home')); ?>" class="navbar-brand"><i class="bi bi-box2-fill me-2"></i> Eskrimo Inventory</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <span>Welcome, super admin</span>
            </ul>
        </div>
    </div>
</nav>



<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('active');
    }
</script>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fauzan\inventory-management\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>