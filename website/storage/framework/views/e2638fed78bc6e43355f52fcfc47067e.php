<div class="space-y-6">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('success')); ?></span>
        <button type="button" @click="show = false" class="text-green-500 hover:text-success">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Campaigns')); ?></h1>
            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Create, manage, and track your email campaigns')); ?></p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <svg class="w-4 h-4 text-muted absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="<?php echo e(__('Search campaigns...')); ?>"
                       class="pl-9 pr-4 py-2 text-sm bg-surface-2 border border-border rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent placeholder-gray-400 w-56">
            </div>
            <a href="<?php echo e(route('campaigns.templates')); ?>" wire:navigate class="flex items-center gap-2 px-4 py-2 bg-surface-2 border border-border text-ink text-sm font-medium rounded-xl hover:border-brand/30 hover:text-ink transition-colors">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'mail','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mail','class' => 'w-4 h-4']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <?php echo e(__('Templates')); ?>

            </a>
            <a href="<?php echo e(route('campaigns.create')); ?>" class="btn-primary flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <?php echo e(__('Create Campaign')); ?>

            </a>
        </div>
    </div>

    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Total Campaigns')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e(number_format($totalCampaigns)); ?></p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Emails Sent')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e(number_format($totalSent)); ?></p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Avg Open Rate')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e($avgOpenRate); ?>%</p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Avg Click Rate')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e($avgClickRate); ?>%</p>
        </div>
    </div>

    
    <div class="border-b border-border">
        <nav class="flex gap-6 -mb-px">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['all' => __('All Campaigns'), 'draft' => __('Drafts'), 'scheduled' => __('Scheduled'), 'sent' => __('Sent')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button type="button" wire:click="$set('activeTab', '<?php echo e($key); ?>')"
                    class="pb-3 text-sm font-medium border-b-2 transition-colors whitespace-nowrap <?php echo e($activeTab === $key ? 'border-primary-600 text-primary-700 dark:text-primary-300' : 'border-transparent text-muted hover:text-ink/80 hover:border-border'); ?>">
                <?php echo e($label); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key === 'draft' && $draftCount > 0): ?>
                <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-surface  text-muted"><?php echo e($draftCount); ?></span>
                <?php elseif($key === 'scheduled' && $scheduledCount > 0): ?>
                <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-info/15 text-blue-600"><?php echo e($scheduledCount); ?></span>
                <?php elseif($key === 'sent' && $sentCount > 0): ?>
                <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-success/15 text-success"><?php echo e($sentCount); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </nav>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($selectedCampaigns) > 0): ?>
    <div class="bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 rounded-xl p-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <span class="text-sm text-primary-700 dark:text-primary-300 font-medium"><?php echo e(count($selectedCampaigns)); ?> <?php echo e(__('campaign(s) selected')); ?></span>
        <div class="flex items-center gap-2 flex-wrap">
            <button type="button" wire:click="bulkDuplicateCampaigns"
                    wire:loading.attr="disabled"
                    class="px-3 py-1.5 text-sm text-muted bg-surface-2 border border-border rounded-lg hover:bg-surface transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="bulkDuplicateCampaigns"><?php echo e(__('Duplicate')); ?></span>
                <span wire:loading wire:target="bulkDuplicateCampaigns" class="inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    <?php echo e(__('Duplicating...')); ?>

                </span>
            </button>
            <button type="button" wire:click="bulkDeleteCampaigns"
                    wire:confirm="Delete <?php echo e(count($selectedCampaigns)); ?> campaign(s)? Only draft, sent, paused, and canceled campaigns will be deleted."
                    wire:loading.attr="disabled"
                    class="px-3 py-1.5 text-sm text-danger bg-surface-2 border border-danger/20 rounded-lg hover:bg-danger/10 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="bulkDeleteCampaigns"><?php echo e(__('Delete')); ?></span>
                <span wire:loading wire:target="bulkDeleteCampaigns" class="inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    <?php echo e(__('Deleting...')); ?>

                </span>
            </button>
            <button type="button" wire:click="$set('selectedCampaigns', [])" class="px-3 py-1.5 text-sm text-muted hover:text-ink transition-colors">
                <?php echo e(__('Clear')); ?>

            </button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="space-y-4">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaigns->count() > 0): ?>
        <div class="flex items-center gap-2 px-1">
            <input type="checkbox" wire:model.live="selectAll"
                   aria-label="Select all campaigns"
                   class="w-4 h-4 text-primary-600 border-border rounded focus:ring-primary-500">
            <span class="text-xs text-muted font-medium"><?php echo e(__('Select all on this page')); ?></span>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden hover:shadow-sm transition-shadow <?php echo e(in_array((string) $campaign->id, $selectedCampaigns) ? 'ring-2 ring-primary-300' : ''); ?>" <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'campaign-'.e($campaign->id).''; ?>wire:key="campaign-<?php echo e($campaign->id); ?>">
            <div class="p-5">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                    
                    <div class="flex-1 min-w-0 flex items-start gap-3">
                        <div class="pt-1 shrink-0">
                            <input type="checkbox" value="<?php echo e($campaign->id); ?>" wire:model.live="selectedCampaigns"
                                   aria-label="Select campaign"
                                   class="w-4 h-4 text-primary-600 border-border rounded focus:ring-primary-500">
                        </div>
                        <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 flex-wrap mb-1">
                            <h3 class="text-base font-semibold text-ink"><?php echo e($campaign->name); ?></h3>
                            <?php
                                $statusColors = [
                                    'draft' => 'bg-surface  text-muted ',
                                    'scheduled' => 'bg-info/15 text-info',
                                    'sending' => 'bg-warning/15 text-warning',
                                    'sent' => 'bg-success/15 text-success',
                                    'paused' => 'bg-orange-100 text-orange-700',
                                    'canceled' => 'bg-danger/15 text-danger',
                                ];
                            ?>
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium <?php echo e($statusColors[$campaign->status] ?? 'bg-surface  text-muted '); ?>">
                                <?php echo e(ucfirst($campaign->status)); ?>

                            </span>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($campaign->channel ?? 'email') === 'sms'): ?>
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-success/15 text-success inline-flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                <?php echo e(__('SMS')); ?>

                            </span>
                            <?php else: ?>
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-info/15 text-info inline-flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <?php echo e(__('Email')); ?>

                            </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaign->type === 'ab_test'): ?>
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-brand/15 text-brand"><?php echo e(__('A/B Test')); ?></span>
                            <?php elseif($campaign->type === 'drip'): ?>
                            <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-brand/15 text-brand"><?php echo e(__('Auto Follow-up')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($campaign->channel ?? 'email') === 'sms' && $campaign->body_text): ?>
                        <p class="text-sm text-muted mb-1"><?php echo e(\Illuminate\Support\Str::limit($campaign->body_text, 90)); ?></p>
                        <?php elseif($campaign->subject): ?>
                        <p class="text-sm text-muted  mb-1"><?php echo e($campaign->subject); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="flex items-center gap-4 text-xs text-muted mt-1">
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                <?php echo e(number_format($campaign->recipients_count)); ?> <?php echo e(__('recipients')); ?>

                            </span>
                            <span><?php echo e(__('Created')); ?> <?php echo e($campaign->created_at->format('M j, Y')); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaign->scheduled_at && $campaign->status === 'scheduled'): ?>
                            <span class="hidden sm:inline"><?php echo e(__('Scheduled:')); ?> <?php echo e($campaign->scheduled_at->format('M j, Y \a\t g:i A')); ?></span>
                            <?php elseif($campaign->sent_at): ?>
                            <span class="hidden sm:inline"><?php echo e(__('Sent')); ?> <?php echo e($campaign->sent_at->format('M j, Y \a\t g:i A')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        </div>
                    </div>

                    
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaign->status === 'draft'): ?>
                        <a href="<?php echo e(route('campaigns.edit', $campaign->id)); ?>" class="px-3 py-1.5 text-sm text-primary-700 dark:text-primary-300 bg-primary-50 dark:bg-primary-900/20 rounded-lg hover:bg-primary-100 dark:hover:bg-primary-900/30 font-medium"><?php echo e(__('Edit')); ?></a>
                        <?php elseif($campaign->status === 'scheduled'): ?>
                        <a href="<?php echo e(route('campaigns.edit', $campaign->id)); ?>" class="px-3 py-1.5 text-sm text-muted  bg-surface rounded-lg hover:bg-surface  font-medium"><?php echo e(__('Edit')); ?></a>
                        <button type="button" wire:click="pauseCampaign(<?php echo e($campaign->id); ?>)" wire:confirm="Are you sure you want to pause this campaign?" wire:loading.attr="disabled" class="px-3 py-1.5 text-sm text-orange-700 dark:text-orange-400 bg-orange-50 dark:bg-orange-900/20 rounded-lg hover:bg-orange-100 dark:hover:bg-orange-900/30 font-medium disabled:opacity-50 disabled:cursor-not-allowed"><?php echo e(__('Pause')); ?></button>
                        <?php elseif(in_array($campaign->status, ['sent', 'sending'])): ?>
                        <a href="<?php echo e(route('campaigns.report', $campaign->id)); ?>" class="px-3 py-1.5 text-sm text-primary-700 dark:text-primary-300 bg-primary-50 dark:bg-primary-900/20 rounded-lg hover:bg-primary-100 dark:hover:bg-primary-900/30 font-medium"><?php echo e(__('View Report')); ?></a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div x-data="{
                                open: false, menuTop: 0, menuLeft: 0,
                                reposition() { const r = this.$refs.trigger.getBoundingClientRect(); this.menuLeft = r.right - 160; this.menuTop = r.bottom + 4; },
                                toggle() { this.open = !this.open; if (this.open) this.$nextTick(() => this.reposition()); },
                             }"
                             @scroll.window="open && reposition()" @resize.window="open && reposition()" @keydown.escape.window="open = false">
                            <button type="button" x-ref="trigger" @click="toggle()" class="p-1.5 text-muted/60 hover:text-ink rounded-lg hover:bg-surface" aria-label="More actions" aria-haspopup="true" :aria-expanded="open">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01"/></svg>
                            </button>
                            <template x-teleport="body">
                                <div x-show="open" @click.outside="open = false" x-transition
                                     role="menu"
                                     :style="`position: fixed; top: ${menuTop}px; left: ${menuLeft}px; z-index: 9999;`"
                                     class="w-40 bg-surface-2 rounded-xl shadow-lg border border-border py-1" style="display: none;">
                                    <button type="button" role="menuitem" @click="open = false" wire:click="duplicateCampaign(<?php echo e($campaign->id); ?>)" class="w-full text-left px-4 py-2 text-sm text-ink/80 hover:bg-surface"><?php echo e(__('Duplicate')); ?></button>
                                    <button type="button" role="menuitem" @click="open = false" wire:click="deleteCampaign(<?php echo e($campaign->id); ?>)" wire:confirm="Are you sure you want to delete this campaign?" class="w-full text-left px-4 py-2 text-sm text-danger hover:bg-danger/10"><?php echo e(__('Delete')); ?></button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($campaign->status, ['sent', 'sending'])): ?>
                <div class="mt-4 pt-4 border-t border-border">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div>
                            <p class="text-xs text-muted uppercase font-medium"><?php echo e(__('Sent')); ?></p>
                            <p class="text-lg font-bold text-ink mt-0.5"><?php echo e(number_format($campaign->sent_count)); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-muted uppercase font-medium"><?php echo e(__('Opened')); ?></p>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <p class="text-lg font-bold text-ink"><?php echo e(number_format($campaign->opened_count)); ?></p>
                                <span class="text-xs font-medium text-success"><?php echo e($campaign->open_rate); ?>%</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-muted uppercase font-medium"><?php echo e(__('Clicked')); ?></p>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <p class="text-lg font-bold text-ink"><?php echo e(number_format($campaign->clicked_count)); ?></p>
                                <span class="text-xs font-medium text-success"><?php echo e($campaign->click_rate); ?>%</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-muted uppercase font-medium"><?php echo e(__('Delivery')); ?></p>
                            <?php
                                $deliveryRate = $campaign->sent_count > 0
                                    ? round((($campaign->sent_count - $campaign->bounced_count) / $campaign->sent_count) * 100, 1)
                                    : 0;
                            ?>
                            <div class="flex items-center gap-2 mt-1">
                                <div class="flex-1 h-1.5 bg-surface  rounded-full">
                                    <div class="h-full bg-success/100 rounded-full" style="width: <?php echo e($deliveryRate); ?>%"></div>
                                </div>
                                <span class="text-xs font-medium text-muted "><?php echo e($deliveryRate); ?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['type' => 'campaigns','title' => __('No campaigns yet'),'description' => __('Create your first campaign to start engaging your audience.'),'actionUrl' => '/campaigns/create','actionLabel' => __('Create Campaign')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'campaigns','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('No campaigns yet')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create your first campaign to start engaging your audience.')),'action-url' => '/campaigns/create','action-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create Campaign'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $attributes = $__attributesOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__attributesOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $component = $__componentOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__componentOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($campaigns->hasPages()): ?>
    <div class="mt-4">
        <?php echo e($campaigns->links()); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/campaigns/campaign-list.blade.php ENDPATH**/ ?>