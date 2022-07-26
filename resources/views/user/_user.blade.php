<div class="card mb-3 shadow border-0">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('user.show', ['user' => $user['id']]) }}" class="nav-link">
                {{ $user['name'] }}
            </a>
        </h5>
        <p class="card-text mx-3">
            <small class="text-muted">
                Дата создания {{ $user['created_at'] }}

                @if ($user['updated_at'] !== $user['created_at'])
                    <br /> Последнее изменение {{ $user['updated_at'] }}
                @endif
            </small>
        </p>
        <p class="card-text">
            <a href="mailto://{{ $user['email'] }}">Написать на E-mail</a> 
            {{ $user['email'] }}
        </p>

        @if (Auth::check() && ((Auth::user()->id === $user['id']) || Auth::user()->isAdmin()))
            <form action='{{ route('user.delete', ['user' => $user['id']]) }}'  method="POST">
                @method('DELETE')
                @csrf
                <a 
                    href='{{ route('user.edit', ['user' => $user['id']]) }}' 
                    class="btn btn-primary float-start" 
                    style="background-image: var(--bs-gradient);"
                >
                    Изменить
                </a>
                <button type="submit" class="btn btn-secondary float-end" style="background-image: var(--bs-gradient);">
                    Удалить
                </button>
            </form>
        @endif
    </div>
</div>