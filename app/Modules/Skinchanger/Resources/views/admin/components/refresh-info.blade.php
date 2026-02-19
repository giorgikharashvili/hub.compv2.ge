<x-alert type="info" class="d-flex flex-column gap-2 mb-3 mt-4" withClose="false">
    <h5 class="text-center">{{ __('skinchanger.admin.refresh.info.title') }}</h5>
    <p class="mb-2 small text-balance text-center">{!! __('skinchanger.admin.refresh.info.notice') !!}</p>
    <p class="mb-2 small text-muted text-center">{{ __('skinchanger.admin.refresh.info.timing', ['timeout' => $httpTimeout, 'budget' => $taskBudget]) }}</p>
    <small class="mb-0" style="color: var(--primary); text-align: center; display: block;">{!! __('skinchanger.admin.refresh.info.source', ['url' => e($dataSourceUrl)]) !!}</small>
</x-alert>
