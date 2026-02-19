<?php if(is_callable($typeForm)): ?>
    <?php echo $typeForm(get_defined_vars()); ?>

<?php else: ?>
<?php $__env->startComponent($typeForm, get_defined_vars() ?? []); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Core.Modules.Admin.Resources.views.components.fields.textarea','data' => ['name' => ''.e($attributes->get('name')).'','label' => ''.e($label ?? '').'','value' => $value,'rows' => ''.e($attributes->get('rows', 5)).'','placeholder' => ''.e($attributes['placeholder'] ?? __('Enter your message')).'','readOnly' => $readOnly ?? false,'withoutBottom' => $withoutBottom ?? false,'attributes' => $attributes->except(['name', 'placeholder', 'rows'])->class(['additional-class' => true])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => ''.e($attributes->get('name')).'','label' => ''.e($label ?? '').'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'rows' => ''.e($attributes->get('rows', 5)).'','placeholder' => ''.e($attributes['placeholder'] ?? __('Enter your message')).'','readOnly' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($readOnly ?? false),'withoutBottom' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($withoutBottom ?? false),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->except(['name', 'placeholder', 'rows'])->class(['additional-class' => true]))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Core/Modules/Admin/Resources/views/partials/fields/textarea.blade.php ENDPATH**/ ?>