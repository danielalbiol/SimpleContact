<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0aWQguA\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0aWQguA/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container0aWQguA.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container0aWQguA\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container0aWQguA\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '0aWQguA',
    'container.build_id' => '7cd10d99',
    'container.build_time' => 1550050750,
], __DIR__.\DIRECTORY_SEPARATOR.'Container0aWQguA');