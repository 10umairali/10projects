<div class="space-y-6">
    <div class="bg-surface-2 rounded-2xl border border-border p-6">
        <h2 class="text-lg font-semibold text-ink"><?php echo e(__('Phone number & discovery')); ?></h2>
        <p class="text-sm text-muted mt-1"><?php echo e(__('Add your phone number. If verification is available you can also let people who already have your number saved find you here, like in other chat apps. Nothing is shared until you verify your number and switch discovery on.')); ?></p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($message): ?>
        <div class="rounded-xl border px-4 py-3 text-sm <?php echo e($ok ? 'border-green-300 bg-green-50 text-green-800' : 'border-red-300 bg-red-50 text-red-800'); ?>"><?php echo e($message); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!($status['verification_enabled'] ?? false)): ?>
        <div class="rounded-xl border border-border bg-surface-2 px-4 py-3 text-sm text-muted">
            <?php echo e(($status['unverified_discovery'] ?? false) ? __('Number verification is switched off, so your number is saved without a code. Friends can still find you if you turn discovery on; they will see that your number is not verified.') : __('Number verification is switched off, so your number is saved without a code. Friend discovery needs a verified number, so it is not available right now.')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="bg-surface-2 rounded-2xl border border-border p-6 space-y-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($status['has_number'] ?? false) && !($status['verified'] ?? false) && !($status['pending'] ?? false) && ($status['unverified_discovery'] ?? false)): ?>
            <div class="flex items-center justify-between gap-3">
                <div><div class="text-xs text-muted"><?php echo e(__('Saved number')); ?></div><div class="font-medium text-ink"><?php echo e($status['number']); ?> <span class="text-xs text-muted">· <?php echo e(__('not verified')); ?></span></div></div>
                <button type="button" wire:click="removeNumber" wire:confirm="<?php echo e(__('Remove your phone number?')); ?>" class="text-sm text-muted hover:text-red-600"><?php echo e(__('Remove')); ?></button>
            </div>
            <div class="border-t border-border pt-4 flex items-start justify-between gap-4">
                <div>
                    <div class="font-medium text-ink"><?php echo e(__('Let people who have my number find me')); ?></div>
                    <div class="text-sm text-muted"><?php echo e(__('Friends will see that your number is not verified. They see your name and photo; your email stays private until you accept.')); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['discoverable']): ?>
                    <button type="button" wire:click="setDiscoverable(false)" class="btn-secondary flex-shrink-0"><?php echo e(__('Turn off')); ?></button>
                <?php else: ?>
                    <button type="button" wire:click="setDiscoverable(true)" class="btn-primary flex-shrink-0"><?php echo e(__('Turn on')); ?></button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php elseif(($status['has_number'] ?? false) && !($status['verified'] ?? false) && !($status['pending'] ?? false) && !($status['verification_enabled'] ?? false)): ?>
            <div class="flex items-center justify-between gap-3">
                <div><div class="text-xs text-muted"><?php echo e(__('Saved number')); ?></div><div class="font-medium text-ink"><?php echo e($status['number']); ?> <span class="text-xs text-muted">· <?php echo e(__('not verified')); ?></span></div></div>
                <button type="button" wire:click="removeNumber" wire:confirm="<?php echo e(__('Remove your phone number?')); ?>" class="text-sm text-muted hover:text-red-600"><?php echo e(__('Remove')); ?></button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['verified'] ?? false): ?>
            <div class="flex items-center justify-between gap-3">
                <div><div class="text-xs text-muted"><?php echo e(__('Verified number')); ?></div><div class="font-medium text-ink"><?php echo e($status['number']); ?></div></div>
                <button type="button" wire:click="removeNumber" wire:confirm="<?php echo e(__('Remove your phone number?')); ?>" class="text-sm text-muted hover:text-red-600"><?php echo e(__('Remove')); ?></button>
            </div>
            <div class="border-t border-border pt-4 flex items-start justify-between gap-4">
                <div>
                    <div class="font-medium text-ink"><?php echo e(__('Let people who have my number find me')); ?></div>
                    <div class="text-sm text-muted"><?php echo e(__('They see your name and photo and can send you a request. Your email stays private until you accept.')); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($status['discoverable']): ?>
                    <button type="button" wire:click="setDiscoverable(false)" class="btn-secondary flex-shrink-0"><?php echo e(__('Turn off')); ?></button>
                <?php else: ?>
                    <button type="button" wire:click="setDiscoverable(true)" class="btn-primary flex-shrink-0"><?php echo e(__('Turn on')); ?></button>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php else: ?>
            <div>
                <label class="block text-sm font-medium text-ink mb-1"><?php echo e(($status['has_number'] ?? false) ? __('Change phone number') : __('Your phone number')); ?></label>
                <div class="flex flex-wrap gap-2">
                    <select wire:model="country" aria-label="<?php echo e(__('Country code')); ?>" class="rounded-xl border border-border bg-surface px-3 py-2 text-sm w-48">
                        <option value=""><?php echo e(__('Country code')); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = config('phone_countries', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($c['iso']); ?>"><?php echo e($c['flag']); ?> <?php echo e($c['name']); ?> (<?php echo e($c['dial']); ?>)</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                    <input type="tel" inputmode="tel" wire:model="national" placeholder="<?php echo e(__('Phone number')); ?>" class="flex-1 min-w-[10rem] rounded-xl border border-border bg-surface px-3 py-2 text-sm">
                </div>
                <p class="text-xs text-muted mt-1"><?php echo e(__('Choose your country, then type your number without the country code.')); ?></p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($status['channels'] ?? []) > 1): ?>
                <div>
                    <div class="text-sm font-medium text-ink mb-1"><?php echo e(__('Send my code by')); ?></div>
                    <div class="flex gap-4 text-sm">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $status['channels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <label class="inline-flex items-center gap-2"><input type="radio" wire:model="channel" value="<?php echo e($ch); ?>"> <?php echo e($ch === 'sms' ? 'SMS' : 'WhatsApp'); ?></label>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <button type="button" wire:click="saveNumber" class="btn-primary">
                <?php echo e(($status['verification_enabled'] ?? false) ? __('Send code') : __('Save number')); ?>

            </button>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($status['pending'] ?? false) && ($status['verification_enabled'] ?? false)): ?>
                <div class="border-t border-border pt-4">
                    <label class="block text-sm font-medium text-ink mb-1"><?php echo e(__('Verification code')); ?></label>
                    <div class="flex gap-2">
                        <input type="text" inputmode="numeric" maxlength="6" wire:model="code" class="w-40 rounded-xl border border-border bg-surface px-3 py-2 text-sm tracking-widest">
                        <button type="button" wire:click="verify" class="btn-primary"><?php echo e(__('Verify')); ?></button>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <p class="text-xs text-muted"><?php echo e(__('How discovery works: if someone saved your number in their contacts, they are told you are here and can send a request, but only if your number is verified and you turned discovery on. You can turn it off or remove your number at any time.')); ?></p>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/settings/phone-discovery.blade.php ENDPATH**/ ?>