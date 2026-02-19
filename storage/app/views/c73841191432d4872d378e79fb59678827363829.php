<?php
    $captchaService = app(\Flute\Core\Services\CaptchaService::class);
    $type = $captchaService->getType();
    $siteKey = $captchaService->getSiteKey();
    $scriptUrl = $captchaService->getScriptUrl();

    $enabled = isset($enabled)
        ? filter_var($enabled, FILTER_VALIDATE_BOOLEAN)
        : $captchaService->isEnabled($action ?? 'login');

    $secretKey = match ($type) {
        'recaptcha_v2' => (string) config('auth.captcha.recaptcha.secret_key', ''),
        'recaptcha_v3' => (string) config('auth.captcha.recaptcha_v3.secret_key', ''),
        'hcaptcha' => (string) config('auth.captcha.hcaptcha.secret_key', ''),
        'turnstile' => (string) config('auth.captcha.turnstile.secret_key', ''),
        default => '',
    };

    $isConfigured = !empty($siteKey) && !empty($secretKey) && !empty($scriptUrl);
    $captchaAction = (string) ($action ?? 'login');
    $instanceId = 'captcha_' . uniqid();
?>

<?php if($enabled && $isConfigured): ?>
    <?php if(request()->htmx()->isHtmxRequest()): ?>
        <script src="<?php echo e($scriptUrl); ?>" async defer></script>
    <?php else: ?>
        <?php $__env->startPush('head'); ?>
            <script src="<?php echo e($scriptUrl); ?>" async defer></script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>

    <div class="captcha-container mb-3 w-100">
        <?php if($type === 'recaptcha_v2'): ?>
            <div class="g-recaptcha w-100" data-sitekey="<?php echo e($siteKey); ?>"></div>
        <?php elseif($type === 'recaptcha_v3'): ?>
            <input type="hidden" id="<?php echo e($instanceId); ?>_token" name="g-recaptcha-response" value="" />
            <script>
                (function() {
                    var input = document.getElementById(<?php echo json_encode($instanceId + '_token', 15, 512) ?>);
                    if (!input) return;
                    var form = input.closest('form');
                    if (!form) return;

                    if (form.dataset.captchaV3Attached === '1') return;
                    form.dataset.captchaV3Attached = '1';

                    form.addEventListener('submit', function(e) {
                        if (input.value) return;
                        if (form.dataset.captchaV3InFlight === '1') return;

                        e.preventDefault();
                        form.dataset.captchaV3InFlight = '1';

                        var siteKey = <?php echo json_encode($siteKey, 15, 512) ?>;
                        var action = <?php echo json_encode($captchaAction, 15, 512) ?>;

                        try {
                            if (!window.grecaptcha || !window.grecaptcha.ready) {
                                form.dataset.captchaV3InFlight = '0';
                                form.submit();
                                return;
                            }

                            window.grecaptcha.ready(function() {
                                window.grecaptcha.execute(siteKey, {
                                        action: action
                                    })
                                    .then(function(token) {
                                        input.value = token || '';
                                        form.dataset.captchaV3InFlight = '0';
                                        form.submit();
                                    })
                                    .catch(function() {
                                        form.dataset.captchaV3InFlight = '0';
                                        form.submit();
                                    });
                            });
                        } catch (err) {
                            form.dataset.captchaV3InFlight = '0';
                            form.submit();
                        }
                    });
                })();
            </script>
        <?php elseif($type === 'hcaptcha'): ?>
            <div class="h-captcha w-100" data-sitekey="<?php echo e($siteKey); ?>"></div>
        <?php elseif($type === 'turnstile'): ?>
            <div class="cf-turnstile w-100" data-sitekey="<?php echo e($siteKey); ?>"></div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/compvge/public_html/bootstrap/../app/Themes/standard/views/components/captcha.blade.php ENDPATH**/ ?>