<div>
    <style>
    
    .check-box {
        transform: scale(2);
    }
    
    .check-box input[type="checkbox"] {
        position: relative;
        appearance: none;
        width: 20px;
        height: 10px;
        background: #ccc;
        border-radius: 10%;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: 0.4s;
    }
    
    .check-box input:checked[type="checkbox"] {
        background: #0162e8;
    }
    
    .check-box input[type="checkbox"]::after {
        position: absolute;
        content: "";
        width: 10px;
        height: 10px;
        top: 0;
        left: 0;
        background: #fff;
        border-radius: 10%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
        transition: 0.4s;
    }
    
    .check-box input:checked[type="checkbox"]::after {
        left: 50%;
    }
    </style>

    <div class="check-box">
      <input
        type="checkbox"
        id="toggle-{{ $setting->id }}"
        wire:model="isStatus"
        {{-- wire:click="toggleStatus('{{ $setting->status }}')" --}}
        {{-- wire:loading.attr="disabled" --}}
        {{ $setting->status->isActive() ? 'checked' : '' }}
      />

    </div>

</div>
  