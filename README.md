# OTP Input Component

A customizable OTP (One-Time Password) input component built with **Alpine.js** and **Laravel Blade**.

---

## ✨ Features

- Auto-focus next input field  
- Paste support  
- Keyboard navigation  
- Mobile-friendly numeric input  
- Dark mode support  
- Customizable number of digits  

---

## 📦 Installation

Place the component in your Laravel project. Ensure Alpine.js and Tailwind CSS are included in your stack.

---

## 🔧 Usage

### Basic Usage

```blade
<x-otp-input />
```

### Advanced Usage

#### With Alpine.js Data Binding

```blade
<x-otp-input x-model="otp" :digits="6" />
```

#### With Livewire

```blade
<livewire:otp-input :digits="6" wire:model="otp" />
```

---

## 🧩 Props

| Prop   | Type   | Default | Description                  |
|--------|--------|---------|------------------------------|
| digits | number | 6       | Number of OTP input fields   |

---

## 🎨 Styling

The component uses **Tailwind CSS** classes for styling. Default classes include:

- `w-12 h-12` — Input field size  
- `text-center` — Centered input  
- `rounded-md` — Rounded borders  
- Dark mode support using `dark:` variants  
- `focus:outline-none` and ring indicators on focus  

---

## 📚 Events

The component handles the following events:

- `paste` — Distributes pasted numbers across input fields  
- `keydown` — Handles backspace and arrow navigation  
- `input` — Validates numeric input and auto-focuses next field  

---

## 🧪 Example Implementation

```blade
<x-otp-input :digits="6" x-model="pin" />
```

---

## 📝 Notes

- Automatically updates the PIN value when any digit changes  
- Only numeric inputs are allowed  
- Maximum input per field: **1 character**  
- Fully responsive for mobile with numeric keyboard support  
- Supports both **light** and **dark** themes  

---

Enjoy building secure and beautiful OTP input forms! 🎉
# Laravel-Livewire-PIN-Input
