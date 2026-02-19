<?php
    /**
     * @var string $currency
     */
    $currency;
?>

<div class="lk-payment-container">
    <div class="lk-payment-layout">
        <div class="lk-payment-main">
            <form class="lk-form" id="payment-form" yoyo:post="purchase" yoyo:on="submit" aria-live="polite" role="form"
                aria-label="<?php echo e(__('lk.payment_form')); ?>">

                <div class="lk-payment-section" id="currency-section">
                    <h3 class="lk-payment-section-title"><?php echo e(__('lk.select_currency')); ?></h3>

                    <?php if(count($currencies) > 1): ?>
                        <div class="lk-payment-section-content">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.forms.field','data' => ['class' => 'lk-field']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'lk-field']); ?>
                                <ul class="lk-currencies" role="radiogroup" aria-label="<?php echo e(__('lk.select_currency')); ?>">
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="lk-currencies-item">
                                            <input type="radio" id="currency__<?php echo e($code); ?>" name="currency"
                                                value="<?php echo e($code); ?>" <?php if($currency === $code): echo 'checked'; endif; ?> yoyo
                                                aria-label="<?php echo e(__('lk.currency_option', ['code' => $code])); ?>"
                                                data-noprogress />
                                            <label for="currency__<?php echo e($code); ?>" tabindex="0">
                                                <span class="lk-currency-code"><?php echo e($code); ?></span>
                                                <span class="lk-currency-rate">1 <?php echo e($code); ?> =
                                                    <?php echo e($currencyExchangeRates[$code]); ?>

                                                    <?php echo e(config('lk.currency_view')); ?></span>
                                            </label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php if(!$currency): ?>
                                    <small class="lk-payment-hint"><?php echo e(__('lk.select_currency_prompt')); ?></small>
                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="lk-payment-section-content">
                            <div class="lk-payment-selected">
                                <div class="content">
                                    <span class="lk-currency-code"><?php echo e($currency); ?></span>
                                    <span class="lk-currency-rate">1:<?php echo e($currencyExchangeRates[$currency]); ?>

                                        <?php echo e(config('lk.currency_view')); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="lk-payment-section" id="gateway-section">
                    <?php if(!empty($currencyGateways[$currency])): ?>
                        <h3 class="lk-payment-section-title"><?php echo e(__('lk.select_gateway')); ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($currencyGateways[$currency])): ?>
                        <div class="lk-payment-section-content">
                            <?php if(count($currencyGateways[$currency]) > 1): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.forms.field','data' => ['class' => 'lk-field']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'lk-field']); ?>
                                    <ul class="lk-gateways" role="radiogroup"
                                        aria-label="<?php echo e(__('lk.select_gateway')); ?>">
                                        <?php $__currentLoopData = $currencyGateways[$currency]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gatewayObject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $gatewayName = $gatewayObject['name'];
                                                $gatewayImage = $gatewayObject['image'];
                                            ?>

                                            <li class="lk-gateways-item">
                                                <input type="radio" id="gateway__<?php echo e($key); ?>" name="gateway"
                                                    value="<?php echo e($key); ?>" <?php if($gateway === $key): echo 'checked'; endif; ?> yoyo
                                                    aria-label="<?php echo e(__('lk.gateway_option', ['name' => $gatewayName])); ?>"
                                                    data-noprogress />
                                                <label for="gateway__<?php echo e($key); ?>" tabindex="0">
                                                    <div class="lk-gateway-info">
                                                        <h5><?php echo e($gatewayName); ?></h5>
                                                    </div>
                                                    <img src="<?php echo e(asset($gatewayImage ?? 'assets/img/payments/' . $key . '.webp')); ?>"
                                                        alt="<?php echo e($gatewayName); ?>" loading="lazy" width="80"
                                                        height="100" />
                                                </label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php if(!$gateway): ?>
                                        <small class="lk-payment-hint"><?php echo e(__('lk.select_gateway_prompt')); ?></small>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php
                                    $gatewayKey = array_key_first($currencyGateways[$currency]);
                                    $gatewayObject = $currencyGateways[$currency][$gatewayKey];
                                    $gatewayName = $gatewayObject['name'];
                                    $gatewayImage = $gatewayObject['image'];
                                ?>
                                <div class="lk-payment-selected">
                                    <div class="content">
                                        <span class="lk-gateway-name"><?php echo e($gatewayName); ?></span>
                                    </div>
                                    <img src="<?php echo e(asset($gatewayImage ?? 'assets/img/payments/' . $gatewayKey . '.webp')); ?>"
                                        alt="<?php echo e($gatewayName); ?>" loading="lazy" width="80" height="100" />
                                    <input type="hidden" name="gateway" value="<?php echo e($gatewayKey); ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="lk-payment-section-content">
                            <div class="lk-payment-error">
                                <?php echo e(__('lk.no_gateways_for_currency')); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($currency && !empty($currencyGateways[$currency]) && $gateway): ?>
                    <div class="lk-payment-section" id="amount-section">
                        <h3 class="lk-payment-section-title"><?php echo e(__('lk.top_up_amount')); ?></h3>

                        <div class="lk-payment-section-content">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.forms.field','data' => ['yoyo' => true,'yoyo:on' => 'input changed delay:500ms','dataNoprogress' => true,'class' => 'lk-field']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['yoyo' => true,'yoyo:on' => 'input changed delay:500ms','data-noprogress' => true,'class' => 'lk-field']); ?>
                                <div class="lk-amount-input-wrapper">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'number','name' => 'amount','id' => 'amount','min' => ''.e($currencyMinimumAmounts[$currency]).'','step' => '0.01','value' => ''.e($amount).'','required' => true,'placeholder' => ''.e(__('lk.enter_amount')).'','ariaDescribedby' => 'amount-description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','name' => 'amount','id' => 'amount','min' => ''.e($currencyMinimumAmounts[$currency]).'','step' => '0.01','value' => ''.e($amount).'','required' => true,'placeholder' => ''.e(__('lk.enter_amount')).'','aria-describedby' => 'amount-description']); ?>
                                         <?php $__env->slot('postPrefix', null, []); ?> 
                                            <span class="lk-amount-currency"><?php echo e($currency); ?></span>
                                         <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>

                                <div class="lk-amount-info">
                                    <small class="lk-payment-hint" id="amount-description">
                                        <?php echo e(__('lk.min_amount_info', ['amount' => $currencyMinimumAmounts[$currency], 'currency' => $currency])); ?>

                                    </small>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($amount): ?>
                    <div class="lk-payment-section" id="promo-section">
                        <h3 class="lk-payment-section-title"><?php echo e(__('lk.promo_code_label')); ?></h3>

                        <div class="lk-payment-section-content">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.forms.field','data' => ['yoyo' => true,'yoyo:on' => 'input delay:800ms changed blur','yoyo:post' => 'validatePromo','dataNoprogress' => true,'class' => 'lk-field']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['yoyo' => true,'yoyo:on' => 'input delay:800ms changed blur','yoyo:post' => 'validatePromo','data-noprogress' => true,'class' => 'lk-field']); ?>
                                <div class="lk-promo-input-wrapper">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.input','data' => ['type' => 'text','name' => 'promoCode','id' => 'promoCode','value' => ''.e($promoCode).'','placeholder' => ''.e(__('lk.enter_promo_code')).'','ariaDescribedby' => 'promo-status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'promoCode','id' => 'promoCode','value' => ''.e($promoCode).'','placeholder' => ''.e(__('lk.enter_promo_code')).'','aria-describedby' => 'promo-status']); ?>
                                         <?php $__env->slot('postPrefix', null, []); ?> 
                                            <?php if($promoCode): ?>
                                                <button type="button" class="lk-promo-clear"
                                                    data-tooltip="<?php echo e(__('lk.clear_promo')); ?>"
                                                    onclick="document.getElementById('promoCode').value = ''; document.getElementById('promoCode').dispatchEvent(new Event('changed'));">
                                                    <?php if (isset($component)) { $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f = $component; } ?>
<?php $component = Flute\Core\Modules\Icons\Components\IconComponent::resolve(['path' => 'ph.regular.x'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Flute\Core\Modules\Icons\Components\IconComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f)): ?>
<?php $component = $__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f; ?>
<?php unset($__componentOriginal15b69f80cf0e25ca0fac925c6f6e481777724d4f); ?>
<?php endif; ?>
                                                </button>
                                            <?php endif; ?>
                                         <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($currency && !empty($currencyGateways[$currency]) && $gateway && $amount): ?>
                    <?php echo $additionalFields ?? ''; ?>

                <?php endif; ?>
            </form>
        </div>

        <div class="lk-payment-summary" id="payment-summary">
            <h3 class="lk-payment-summary-title"><?php echo e(__('lk.payment_summary')); ?></h3>

            <ul class="lk-details">
                <li class="lk-details-item">
                    <span><?php echo e(__('lk.base_amount')); ?></span>
                    <span><?php echo e($amount ?? 0); ?> <?php echo e($currency); ?></span>
                </li>

                <?php if($promoIsValid && $promoDetails): ?>
                    <li class="lk-details-item lk-details-promo">
                        <span>
                            <?php if($promoDetails['type'] === 'amount'): ?>
                                <?php echo e(__('lk.bonus')); ?>

                            <?php else: ?>
                                <?php echo e(__('lk.discount')); ?>

                            <?php endif; ?>
                        </span>
                        <span class="lk-promo-value">
                            <?php if($promoDetails['type'] === 'amount'): ?>
                                +<?php echo e($promoDetails['value']); ?> <?php echo e($currency); ?>

                            <?php elseif($promoDetails['type'] === 'percentage'): ?>
                                -<?php echo e($promoDetails['value']); ?>%
                            <?php endif; ?>
                        </span>
                    </li>
                <?php endif; ?>

                <li class="lk-details-item lk-details-total">
                    <span><?php echo e(__('lk.to_pay')); ?></span>
                    <span><?php echo e($amountToPay ?? 0); ?> <?php echo e($currency); ?></span>
                </li>

                <li class="lk-details-item lk-details-receive">
                    <span><?php echo e(__('lk.you_will_receive')); ?></span>
                    <span class="lk-receive-amount"><?php echo e($amountToReceive ?? 0); ?>

                        <?php echo e(config('lk.currency_view')); ?></span>
                </li>
            </ul>

            <?php if($amount && config('lk.oferta_view')): ?>
                <div class="lk-payment-terms-section" id="terms-section">
                    <div class="lk-payment-section-content">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.forms.field','data' => ['class' => 'lk-field lk-terms-field']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'lk-field lk-terms-field']); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.fields.checkbox','data' => ['name' => 'agree','id' => 'agree','checked' => ''.e($agree).'','dataNoprogress' => true,'yoyo' => true,'ariaDescribedby' => 'terms-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'agree','id' => 'agree','checked' => ''.e($agree).'','data-noprogress' => true,'yoyo' => true,'aria-describedby' => 'terms-link']); ?>
                                 <?php $__env->slot('label', null, []); ?> 
                                    <?php echo e(__('lk.agree_terms')); ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.link','data' => ['type' => 'accent','href' => ''.e(url(config('lk.oferta_url', '/agreenment'))).'','id' => 'terms-link','target' => '_blank','rel' => 'noopener']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'accent','href' => ''.e(url(config('lk.oferta_url', '/agreenment'))).'','id' => 'terms-link','target' => '_blank','rel' => 'noopener']); ?>
                                        <?php echo e(__('lk.terms_of_offer')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'Themes.standard.views.components.button','data' => ['size' => 'large','class' => 'lk-payment-submit','withLoading' => true,'submit' => true,'form' => 'payment-form','disabled' => ($promoCode && !$promoIsValid) || (config('lk.oferta_view') && $agree === false),'ariaLabel' => ''.e(__('lk.top_up_button', [':amount' => $amount, ':currency_view' => $currency])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'large','class' => 'lk-payment-submit','withLoading' => true,'submit' => true,'form' => 'payment-form','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($promoCode && !$promoIsValid) || (config('lk.oferta_view') && $agree === false)),'aria-label' => ''.e(__('lk.top_up_button', [':amount' => $amount, ':currency_view' => $currency])).'']); ?>
                <span><?php echo e(__('lk.top_up_button', [':amount' => $amount, ':currency_view' => $currency])); ?></span>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/components/payments/payment-form.blade.php ENDPATH**/ ?>