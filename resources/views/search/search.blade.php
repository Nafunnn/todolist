@extends('templates.master')

@section('body')

    <div class="overflow-x-auto dark:text-slate-400 ">
        <h1 class="my-6 text-2xl font-semibold">Your To Do List</h1>
        <form action="/home/search" method="GET">
            @csrf
            <div class="flex gap-2">
                <label class="input input-bordered border-black dark:border-slate-400 dark:bg-slate-700  flex items-center gap-2">
                    <input name="query" type="text" class="grow dark:bg-slate-700" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
                </label>
                <button class="btn btn-outline dark:text-slate-200 dark:hover:bg-slate-200 dark:hover:text-slate-700" type="submit">Search</button>
            </div>
        </form>
        @if (session('status'))
        <div class="toast toast-top toast-end">
            <div class="alert alert-success text-white">
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                <h1 class="text-white">{{ session('status') }}</h1>
            </div>
        </div>
        @endif
        <div class="">
            <table class="table rounded-lg">
                <!-- head -->
                <thead>
                  <tr>

                    <th class="dark:text-slate-400">Title</th>
                    <th class="dark:text-slate-400">Desctiption</th>
                    @if (Auth::user()->role == 'admin')
                    <th class="dark:text-slate-400">Owner</th>
                    @endif
                    <th class="dark:text-slate-400">Priority</th>
                    <th class="dark:text-slate-400">Status</th>
                    <th class="dark:text-slate-400">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  @php
                      $i=1
                  @endphp
                  @foreach ($todosAdmin ?? $todos as $todo)
                      <tr>
                          <td>
                          <div class="flex items-center gap-3">
                              <div>
                              <div class="font-bold">{{ $todo->title }}</div>
                              <div class="text-sm opacity-75">{{ $todo->creation_date }}</div>
                              </div>
                          </div>
                          </td>
                          <td>
                            {{ \Illuminate\Support\Str::limit($todo->desc, 20) }}
                        </td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <h1 class="font-semibold">{{ $todo->user->name }}</h1>
                        </td>
                        @endif

                          <td>
                              <div class=" badge badge-ghost dark:border-none
                              @if ($todo->priority_id == '1' )
                                          bg-info text-white font-medium
                                      @elseif ($todo->priority_id == '2' )
                                          bg-warning text-white font-medium
                                      @elseif ($todo->priority_id == '3' )
                                          bg-error text-white font-medium
                                      @endif">{{ $todo->priority->priority }}</div>
                          </td>
                          <td>
                              <div class="badge badge-ghost dark:border-none
                              @if ($todo->status_id == '1' )
                                          bg-error text-white font-medium
                                      @elseif ($todo->status_id == '2' )
                                          bg-warning text-white font-medium
                                      @elseif ($todo->status_id == '4' )
                                          bg-success text-white font-medium
                                      @endif">{{ $todo->status->status }}</div>
                          </td>
                          <td class="flex gap-1">
                          <a class="btn btn-sm" href="/details/{{ $todo->id }}"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.876892C3.84222 0.876892 0.877075 3.84204 0.877075 7.49972C0.877075 11.1574 3.84222 14.1226 7.49991 14.1226C11.1576 14.1226 14.1227 11.1574 14.1227 7.49972C14.1227 3.84204 11.1576 0.876892 7.49991 0.876892ZM1.82707 7.49972C1.82707 4.36671 4.36689 1.82689 7.49991 1.82689C10.6329 1.82689 13.1727 4.36671 13.1727 7.49972C13.1727 10.6327 10.6329 13.1726 7.49991 13.1726C4.36689 13.1726 1.82707 10.6327 1.82707 7.49972ZM8.24992 4.49999C8.24992 4.9142 7.91413 5.24999 7.49992 5.24999C7.08571 5.24999 6.74992 4.9142 6.74992 4.49999C6.74992 4.08577 7.08571 3.74999 7.49992 3.74999C7.91413 3.74999 8.24992 4.08577 8.24992 4.49999ZM6.00003 5.99999H6.50003H7.50003C7.77618 5.99999 8.00003 6.22384 8.00003 6.49999V9.99999H8.50003H9.00003V11H8.50003H7.50003H6.50003H6.00003V9.99999H6.50003H7.00003V6.99999H6.50003H6.00003V5.99999Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></a>
                          @if (Auth::user()->role == 'user')
                          <a class="btn btn-warning btn-sm" href="/edit/{{ $todo->id }}"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.1464 1.14645C12.3417 0.951184 12.6583 0.951184 12.8535 1.14645L14.8535 3.14645C15.0488 3.34171 15.0488 3.65829 14.8535 3.85355L10.9109 7.79618C10.8349 7.87218 10.7471 7.93543 10.651 7.9835L6.72359 9.94721C6.53109 10.0435 6.29861 10.0057 6.14643 9.85355C5.99425 9.70137 5.95652 9.46889 6.05277 9.27639L8.01648 5.34897C8.06455 5.25283 8.1278 5.16507 8.2038 5.08907L12.1464 1.14645ZM12.5 2.20711L8.91091 5.79618L7.87266 7.87267L8.12731 8.12732L10.2038 7.08907L13.7929 3.5L12.5 2.20711ZM9.99998 2L8.99998 3H4.9C4.47171 3 4.18056 3.00039 3.95552 3.01877C3.73631 3.03668 3.62421 3.06915 3.54601 3.10899C3.35785 3.20487 3.20487 3.35785 3.10899 3.54601C3.06915 3.62421 3.03669 3.73631 3.01878 3.95552C3.00039 4.18056 3 4.47171 3 4.9V11.1C3 11.5283 3.00039 11.8194 3.01878 12.0445C3.03669 12.2637 3.06915 12.3758 3.10899 12.454C3.20487 12.6422 3.35785 12.7951 3.54601 12.891C3.62421 12.9309 3.73631 12.9633 3.95552 12.9812C4.18056 12.9996 4.47171 13 4.9 13H11.1C11.5283 13 11.8194 12.9996 12.0445 12.9812C12.2637 12.9633 12.3758 12.9309 12.454 12.891C12.6422 12.7951 12.7951 12.6422 12.891 12.454C12.9309 12.3758 12.9633 12.2637 12.9812 12.0445C12.9996 11.8194 13 11.5283 13 11.1V6.99998L14 5.99998V11.1V11.1207C14 11.5231 14 11.8553 13.9779 12.1259C13.9549 12.407 13.9057 12.6653 13.782 12.908C13.5903 13.2843 13.2843 13.5903 12.908 13.782C12.6653 13.9057 12.407 13.9549 12.1259 13.9779C11.8553 14 11.5231 14 11.1207 14H11.1H4.9H4.87934C4.47686 14 4.14468 14 3.87409 13.9779C3.59304 13.9549 3.33469 13.9057 3.09202 13.782C2.7157 13.5903 2.40973 13.2843 2.21799 12.908C2.09434 12.6653 2.04506 12.407 2.0221 12.1259C1.99999 11.8553 1.99999 11.5231 2 11.1207V11.1206V11.1V4.9V4.87935V4.87932V4.87931C1.99999 4.47685 1.99999 4.14468 2.0221 3.87409C2.04506 3.59304 2.09434 3.33469 2.21799 3.09202C2.40973 2.71569 2.7157 2.40973 3.09202 2.21799C3.33469 2.09434 3.59304 2.04506 3.87409 2.0221C4.14468 1.99999 4.47685 1.99999 4.87932 2H4.87935H4.9H9.99998Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></a>
                          <!-- The button to open modal -->
                          @endif
                            <label for="my_modal_{{ $i }}" class="btn btn-error btn-sm"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 1C5.22386 1 5 1.22386 5 1.5C5 1.77614 5.22386 2 5.5 2H9.5C9.77614 2 10 1.77614 10 1.5C10 1.22386 9.77614 1 9.5 1H5.5ZM3 3.5C3 3.22386 3.22386 3 3.5 3H5H10H11.5C11.7761 3 12 3.22386 12 3.5C12 3.77614 11.7761 4 11.5 4H11V12C11 12.5523 10.5523 13 10 13H5C4.44772 13 4 12.5523 4 12V4L3.5 4C3.22386 4 3 3.77614 3 3.5ZM5 4H10V12H5V4Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></label>

                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my_modal_{{ $i }}" class="modal-toggle" />
                            <div class="modal" role="dialog">
                            <div class="modal-box dark:bg-slate-700">
                                <h3 class="font-bold text-lg dark:text-slate-200">Are you sure?</h3>
                                <p class="py-4">Are you sure you want to move this todo to the trash? You can restore it back from the trash page!</p>
                                <div class="modal-action flex gap-4">
                                    <a class="btn btn-error text-white" href="/delete/{{ $todo->id }}">Move to Trash</a>
                                    <label for="my_modal_{{ $i }}" class="btn">Close!</label>
                                </div>
                            </div>
                            </div>
                        </td>
                      </tr>
                      @php
                          $i++
                      @endphp
                  @endforeach
                  @if (empty($todosAdmin) && empty($todos))
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
              </table>
        </div>
      </div>
@endsection
