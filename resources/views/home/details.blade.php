@extends('templates.master')

@section('body')
    <div class="dark:text-slate-400">
        <div class="border-b-black dark:border-b-slate-400 border-b">
            <h1 class="my-6 text-2xl font-semibold">To Do Details</h1>
        </div>
        @if (session('status'))
        <div class="toast toast-top toast-end">
            <div class="alert alert-success text-white">
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                <h1 class="text-white">{{ session('status') }}</h1>
            </div>
        </div>
        @endif
        @foreach ($todosAdmin ?? $todos as $todo)
        <div class="grid grid-cols-3">
            <div class="col-span-2">
                @if (Auth::user()->role == 'admin')
                    <h1 class="font-semibold my-4 opacity-50">{{ $todo->user->name }} to do is</h1>
                @else
                    <h1 class="font-semibold my-4 opacity-50">Your to do is</h1>
                @endif
                <h1 class="text-4xl font-semibold">{{ $todo->title }}</h1>
                <div class="my-2">
                    <p class="">{{ $todo->desc }}</p>
                </div>
            </div>
            <div>
                <div class="card rounded-sm w-96 bg-slate-50 shadow-lg dark:bg-neutral dark:text-neutral-content my-4">
                    <div class="card-body">
                      <h2 class="card-title mb-2">Details!</h2>
                      @if (Auth::user()->role == 'admin')
                      <div class="flex justify-between my-2">
                        <div>
                            <h1 class=" opacity-50">Owner</h1>
                            <h1 class="font-semibold">{{ $todo->user->name }}</h1>
                        </div>
                        <div>
                            <h1 class="opacity-50">Email</h1>
                            <h1 class="font-semibold">{{ $todo->user->email }}</h1>
                        </div>
                      </div>
                      @endif
                      <div class="flex justify-between">
                        <div class="text-center">
                            <h3 class="opacity-50">Creation Date</h3>
                            <h1 class="font-semibold">{{ $todo->creation_date }}</h1>
                          </div>
                          <div class="text-center">
                            <h1 class="opacity-50">-</h1>
                            <h2 class="font-semibold">To</h2>
                          </div>
                          <div class="text-center">
                            <h3 class="opacity-50">Due Date</h3>
                            <h1 class="font-semibold">{{ $todo->due_date }}</h1>
                          </div>
                      </div>
                      <div class="grid grid-cols-2 gap-4">
                        <div class="flex gap-4 rounded-lg bg-slate-50 dark:bg-slate-700 shadow-md">
                            <div class="w-2 m-2 @if ($todo->priority == 'Low' )
                                bg-info
                            @elseif ($todo->priority == 'Medium' )
                                bg-warning
                            @elseif ($todo->priority == 'High' )
                                bg-error
                            @endif rounded-lg"></div>
                            <div class="my-2">
                                <h1 class="font-semibold text-xl">{{ $todo->priority }}</h1>
                                <h3 class="opacity-50 -mt-1">Priority</h3>
                            </div>
                          </div>
                          <div class="flex gap-4 rounded-lg bg-slate-50 dark:bg-slate-700 shadow-md">
                            <div class="w-2 m-2 @if ($todo->stat == 'Not Done' )
                                bg-error
                            @elseif ($todo->stat == 'To Do' )
                                bg-warning
                            @elseif ($todo->stat == 'Need Review' )
                                bg-slate-400
                            @elseif ($todo->stat == 'Done' )
                                bg-success
                            @endif rounded-lg"></div>
                            <div class="my-2">
                                <h1 class="font-semibold text-xl">{{ $todo->stat }}</h1>
                                <h3 class="opacity-50 -mt-1">Status</h3>
                            </div>
                          </div>
                      </div>
                        @if (Auth::user()->role == 'admin')
                            @if ($todo->stat == 'Need Review')
                            <div class="mt-4">
                                <a class="btn btn-success w-full" href="/submit/done/{{ $todo->id }}">Submit Done</a>
                            </div>
                            @elseif ($todo->stat == 'Done')
                            <div class="mt-4">
                                <h1 class="text-success text-sm font-semibold">This todo has been validated to be done.</h1>
                            </div>
                            @else
                            <div class="mt-4">
                                <h1 class="text-error text-sm font-semibold">Submit Done can only be done when the status of this todo becomes Need Review.</h1>
                            </div>
                            @endif
                        @else
                        @if ($todo->stat == 'Need Review')
                            <div class="mt-4">
                                <h1 class="text-warning text-sm font-semibold">Waiting for admin to validate this todo.</h1>
                            </div>
                            @elseif ($todo->stat == 'Done')
                            <div class="mt-4">
                                <h1 class="text-success text-sm font-semibold">This todo has been validated to be done.</h1>
                            </div>
                            @else
                            <div class="mt-4">
                                <h1 class="text-error text-sm font-semibold">Submit Done can only be done when the status of this todo becomes Need Review.</h1>
                            </div>
                            @endif
                        @endif

                    </div>
                  </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
