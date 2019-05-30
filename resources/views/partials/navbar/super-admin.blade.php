{{-- Users --}}
<a class="dropdown-item" href="{{ route('users') }}">{{ __('Utenti') }}</a>
{{-- Roles --}}
<a class="dropdown-item" href="{{ route('roles') }}">{{ __('Ruoli') }}</a>
{{-- Permissions --}}
<a class="dropdown-item" href="{{ route('permissions') }}">{{ __('Permessi') }}</a>
{{-- Logs --}}
<a class="dropdown-item" href="{{ route('logs') }}">{{ __('Logs') }}</a>
{{-- System Info --}}
<a class="dropdown-item" href="{{ route('info') }}">{{ __('Sys Info') }}</a>