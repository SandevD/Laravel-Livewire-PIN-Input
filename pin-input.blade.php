@props([
    'digits' => 6,
])

<div class="flex items-center justify-between gap-2"
    x-data="{
        pin: '',
        updatePin() {
            this.pin = Array.from({ length: {{ $digits }} }, (_, i) =>
                this.$refs[`input${i + 1}`]?.value || ''
            ).join('');
        },
        handlePaste(e) {
            e.preventDefault();
            const paste = (e.clipboardData || window.clipboardData).getData('text');
            const digits = paste.replace(/\D/g, '').split('').slice(0, {{ $digits }});
            digits.forEach((digit, index) => {
                if (index < {{ $digits }}) {
                    this.$refs[`input${index + 1}`].value = digit;
                    if (index < {{ $digits }} - 1) {
                        this.$refs[`input${index + 2}`].focus();
                    }
                }
            });
            this.updatePin();
        },
        handleKeydown(e, index) {
            if (e.key === 'Backspace' && !e.target.value) {
                e.preventDefault();
                if (index > 1) {
                    this.$refs[`input${index - 1}`].focus();
                }
            }
            this.updatePin();
        },
        handleInput(e, index) {
            const input = e.target;
            if (input.value) {
                input.value = input.value.replace(/\D/g, '').slice(-1);
                if (index < {{ $digits }}) {
                    this.$refs[`input${index + 1}`].focus();
                }
            }
            this.updatePin();
        }
    }"
    x-modelable="pin"
    {{ $attributes }}>
    @for ($x = 1; $x <= $digits; $x++)
        <input
            x-ref="input{{ $x }}"
            type="text"
            inputmode="numeric"
            pattern="[0-9]"
            x-on:paste="handlePaste($event)"
            x-on:keydown="handleKeydown($event, {{ $x }})"
            x-on:input="handleInput($event, {{ $x }})"
            class="w-12 h-12 font-light text-center text-black dark:text-stone-100 rounded-md border shadow-sm appearance-none auth-component-code-input dark:text-dark-400 border-stone-200 dark:border-stone-700 focus:border-2"
            maxlength="1" />
    @endfor
</div>
