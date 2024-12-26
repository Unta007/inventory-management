<?php
$currentRouteName = Route::currentRouteName();
?>

<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> <!-- Add Bootstrap Icons -->
</head>

<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e($currentRouteName == 'home' ? 'active' : ''); ?>">
                <i class="bi bi-house"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('beverages.index')); ?>" class="nav-link <?php echo e($currentRouteName == 'beverages.index' ? 'active' : ''); ?>">
                <i class="bi bi-cup-straw"></i> Beverage Section
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('kitchen.index')); ?>" class="nav-link <?php echo e($currentRouteName == 'kitchen' ? 'active' : ''); ?>">
                <i class="bi bi-basket3"></i> Kitchen Section
            </a>
        </li>
    </ul>
</div>
<?php /**PATH C:\Users\fauzan\inventory-management\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>