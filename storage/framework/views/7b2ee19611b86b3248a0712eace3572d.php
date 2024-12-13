<?php
$currentRouteName = Route::currentRouteName();
?>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<div class="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Masterrrr</a>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e($currentRouteName == 'home' ? 'active' : ''); ?>">Home</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('beverages.index')); ?>" class="nav-link <?php echo e($currentRouteName == 'beverages.index' ? 'active' : ''); ?>">Beverage</a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="<?php echo e(route('profile')); ?>" class="btn btn-outline-light my-2"><i class="bi-person-circle me-1"></i> My Profile</a>
    </div>
</div>

<div class="main-content">
    <!-- Your homepage content here -->
</div>

<script>
    const sidebar = document.querySelector('.sidebar');
    const toggleButton = document.querySelector('.toggle-button');
    const mainContent = document.querySelector('.main-content');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
</script>
<?php /**PATH C:\Users\fauzan\inventory-management\resources\views/layouts/nav.blade.php ENDPATH**/ ?>
