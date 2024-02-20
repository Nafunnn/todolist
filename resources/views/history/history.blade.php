@extends('templates.master')

@section('body')
<h1 class="my-6 text-2xl font-semibold dark:text-slate-400">History</h1>
    @foreach ($histories as $history)
    <div class="my-2">
        <div role="alert" class="alert shadow-lg border-none
        @if ($history->type == 'create')
            bg-green-400 dark:bg-green-600
        @elseif ($history->type == 'edit')
            bg-yellow-500 dark:bg-yellow-600
        @elseif ($history->type == 'delete')
            bg-red-500 dark:bg-red-600
        @elseif ($history->type == 'move_delete')
            bg-orange-500 dark:bg-orange-600
        @elseif ($history->type == 'restore')
            bg-info dark:bg-info
        @endif">
            <div class=" p-2">
                @if ($history->type == 'create')
                <svg class="" width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 2C3.22386 2 3 2.22386 3 2.5V12.5C3 12.7761 3.22386 13 3.5 13H11.5C11.7761 13 12 12.7761 12 12.5V4.70711L9.29289 2H3.5ZM2 2.5C2 1.67157 2.67157 1 3.5 1H9.5C9.63261 1 9.75979 1.05268 9.85355 1.14645L12.7803 4.07322C12.921 4.21388 13 4.40464 13 4.60355V12.5C13 13.3284 12.3284 14 11.5 14H3.5C2.67157 14 2 13.3284 2 12.5V2.5ZM4.75 7.5C4.75 7.22386 4.97386 7 5.25 7H7V5.25C7 4.97386 7.22386 4.75 7.5 4.75C7.77614 4.75 8 4.97386 8 5.25V7H9.75C10.0261 7 10.25 7.22386 10.25 7.5C10.25 7.77614 10.0261 8 9.75 8H8V9.75C8 10.0261 7.77614 10.25 7.5 10.25C7.22386 10.25 7 10.0261 7 9.75V8H5.25C4.97386 8 4.75 7.77614 4.75 7.5Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                @elseif ($history->type == 'edit')
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.1464 1.14645C12.3417 0.951184 12.6583 0.951184 12.8535 1.14645L14.8535 3.14645C15.0488 3.34171 15.0488 3.65829 14.8535 3.85355L10.9109 7.79618C10.8349 7.87218 10.7471 7.93543 10.651 7.9835L6.72359 9.94721C6.53109 10.0435 6.29861 10.0057 6.14643 9.85355C5.99425 9.70137 5.95652 9.46889 6.05277 9.27639L8.01648 5.34897C8.06455 5.25283 8.1278 5.16507 8.2038 5.08907L12.1464 1.14645ZM12.5 2.20711L8.91091 5.79618L7.87266 7.87267L8.12731 8.12732L10.2038 7.08907L13.7929 3.5L12.5 2.20711ZM9.99998 2L8.99998 3H4.9C4.47171 3 4.18056 3.00039 3.95552 3.01877C3.73631 3.03668 3.62421 3.06915 3.54601 3.10899C3.35785 3.20487 3.20487 3.35785 3.10899 3.54601C3.06915 3.62421 3.03669 3.73631 3.01878 3.95552C3.00039 4.18056 3 4.47171 3 4.9V11.1C3 11.5283 3.00039 11.8194 3.01878 12.0445C3.03669 12.2637 3.06915 12.3758 3.10899 12.454C3.20487 12.6422 3.35785 12.7951 3.54601 12.891C3.62421 12.9309 3.73631 12.9633 3.95552 12.9812C4.18056 12.9996 4.47171 13 4.9 13H11.1C11.5283 13 11.8194 12.9996 12.0445 12.9812C12.2637 12.9633 12.3758 12.9309 12.454 12.891C12.6422 12.7951 12.7951 12.6422 12.891 12.454C12.9309 12.3758 12.9633 12.2637 12.9812 12.0445C12.9996 11.8194 13 11.5283 13 11.1V6.99998L14 5.99998V11.1V11.1207C14 11.5231 14 11.8553 13.9779 12.1259C13.9549 12.407 13.9057 12.6653 13.782 12.908C13.5903 13.2843 13.2843 13.5903 12.908 13.782C12.6653 13.9057 12.407 13.9549 12.1259 13.9779C11.8553 14 11.5231 14 11.1207 14H11.1H4.9H4.87934C4.47686 14 4.14468 14 3.87409 13.9779C3.59304 13.9549 3.33469 13.9057 3.09202 13.782C2.7157 13.5903 2.40973 13.2843 2.21799 12.908C2.09434 12.6653 2.04506 12.407 2.0221 12.1259C1.99999 11.8553 1.99999 11.5231 2 11.1207V11.1206V11.1V4.9V4.87935V4.87932V4.87931C1.99999 4.47685 1.99999 4.14468 2.0221 3.87409C2.04506 3.59304 2.09434 3.33469 2.21799 3.09202C2.40973 2.71569 2.7157 2.40973 3.09202 2.21799C3.33469 2.09434 3.59304 2.04506 3.87409 2.0221C4.14468 1.99999 4.47685 1.99999 4.87932 2H4.87935H4.9H9.99998Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                @elseif ($history->type == 'delete')
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 1C5.22386 1 5 1.22386 5 1.5C5 1.77614 5.22386 2 5.5 2H9.5C9.77614 2 10 1.77614 10 1.5C10 1.22386 9.77614 1 9.5 1H5.5ZM3 3.5C3 3.22386 3.22386 3 3.5 3H5H10H11.5C11.7761 3 12 3.22386 12 3.5C12 3.77614 11.7761 4 11.5 4H11V12C11 12.5523 10.5523 13 10 13H5C4.44772 13 4 12.5523 4 12V4L3.5 4C3.22386 4 3 3.77614 3 3.5ZM5 4H10V12H5V4Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                @elseif ($history->type == 'move_delete')
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.81819 0.93179C7.64245 0.756054 7.35753 0.756054 7.18179 0.93179L5.43179 2.68179C5.25605 2.85753 5.25605 3.14245 5.43179 3.31819C5.60753 3.49392 5.89245 3.49392 6.06819 3.31819L6.99999 2.38638V5.49999C6.99999 5.77613 7.22385 5.99999 7.49999 5.99999C7.77613 5.99999 7.99999 5.77613 7.99999 5.49999V2.38638L8.93179 3.31819C9.10753 3.49392 9.39245 3.49392 9.56819 3.31819C9.74392 3.14245 9.74392 2.85753 9.56819 2.68179L7.81819 0.93179ZM7.99999 9.49999C7.99999 9.22385 7.77613 8.99999 7.49999 8.99999C7.22385 8.99999 6.99999 9.22385 6.99999 9.49999V12.6136L6.06819 11.6818C5.89245 11.5061 5.60753 11.5061 5.43179 11.6818C5.25605 11.8575 5.25605 12.1424 5.43179 12.3182L7.18179 14.0682C7.35753 14.2439 7.64245 14.2439 7.81819 14.0682L9.56819 12.3182C9.74392 12.1424 9.74392 11.8575 9.56819 11.6818C9.39245 11.5061 9.10753 11.5061 8.93179 11.6818L7.99999 12.6136V9.49999ZM8.99999 7.49999C8.99999 7.22385 9.22385 6.99999 9.49999 6.99999H12.6136L11.6818 6.06819C11.5061 5.89245 11.5061 5.60753 11.6818 5.43179C11.8575 5.25605 12.1424 5.25605 12.3182 5.43179L14.0682 7.18179C14.2439 7.35753 14.2439 7.64245 14.0682 7.81819L12.3182 9.56819C12.1424 9.74392 11.8575 9.74392 11.6818 9.56819C11.5061 9.39245 11.5061 9.10753 11.6818 8.93179L12.6136 7.99999H9.49999C9.22385 7.99999 8.99999 7.77613 8.99999 7.49999ZM3.31819 6.06819L2.38638 6.99999H5.49999C5.77613 6.99999 5.99999 7.22385 5.99999 7.49999C5.99999 7.77613 5.77613 7.99999 5.49999 7.99999H2.38638L3.31819 8.93179C3.49392 9.10753 3.49392 9.39245 3.31819 9.56819C3.14245 9.74392 2.85753 9.74392 2.68179 9.56819L0.93179 7.81819C0.756054 7.64245 0.756054 7.35753 0.93179 7.18179L2.68179 5.43179C2.85753 5.25605 3.14245 5.25605 3.31819 5.43179C3.49392 5.60753 3.49392 5.89245 3.31819 6.06819Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                @elseif ($history->type == 'restore')
                <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.90321 7.29677C1.90321 10.341 4.11041 12.4147 6.58893 12.8439C6.87255 12.893 7.06266 13.1627 7.01355 13.4464C6.96444 13.73 6.69471 13.9201 6.41109 13.871C3.49942 13.3668 0.86084 10.9127 0.86084 7.29677C0.860839 5.76009 1.55996 4.55245 2.37639 3.63377C2.96124 2.97568 3.63034 2.44135 4.16846 2.03202L2.53205 2.03202C2.25591 2.03202 2.03205 1.80816 2.03205 1.53202C2.03205 1.25588 2.25591 1.03202 2.53205 1.03202L5.53205 1.03202C5.80819 1.03202 6.03205 1.25588 6.03205 1.53202L6.03205 4.53202C6.03205 4.80816 5.80819 5.03202 5.53205 5.03202C5.25591 5.03202 5.03205 4.80816 5.03205 4.53202L5.03205 2.68645L5.03054 2.68759L5.03045 2.68766L5.03044 2.68767L5.03043 2.68767C4.45896 3.11868 3.76059 3.64538 3.15554 4.3262C2.44102 5.13021 1.90321 6.10154 1.90321 7.29677ZM13.0109 7.70321C13.0109 4.69115 10.8505 2.6296 8.40384 2.17029C8.12093 2.11718 7.93465 1.84479 7.98776 1.56188C8.04087 1.27898 8.31326 1.0927 8.59616 1.14581C11.4704 1.68541 14.0532 4.12605 14.0532 7.70321C14.0532 9.23988 13.3541 10.4475 12.5377 11.3662C11.9528 12.0243 11.2837 12.5586 10.7456 12.968L12.3821 12.968C12.6582 12.968 12.8821 13.1918 12.8821 13.468C12.8821 13.7441 12.6582 13.968 12.3821 13.968L9.38205 13.968C9.10591 13.968 8.88205 13.7441 8.88205 13.468L8.88205 10.468C8.88205 10.1918 9.10591 9.96796 9.38205 9.96796C9.65819 9.96796 9.88205 10.1918 9.88205 10.468L9.88205 12.3135L9.88362 12.3123C10.4551 11.8813 11.1535 11.3546 11.7585 10.6738C12.4731 9.86976 13.0109 8.89844 13.0109 7.70321Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                @endif
            </div>
            <div>
                <h3 class="font-bold">@if ($history->type == 'create')
                    Created New ToDo
                @elseif ($history->type == 'edit')
                    Edited @if ($history->todo_id == 0)
                    User
                    @else
                        ToDo
                    @endif
                @elseif ($history->type == 'delete')
                    Deleted @if ($history->todo_id == 0)
                    User
                    @else
                        ToDo
                    @endif
                @elseif ($history->type == 'move_delete')
                    Moved @if ($history->todo_id == 0)
                    User
                    @else
                        ToDo
                    @endif to Trash
                @elseif ($history->type == 'restore')
                    Restored @if ($history->todo_id == 0)
                    User
                    @else
                        ToDo
                    @endif from Trash
                @endif</h3>
                <div class="text-xs">
                    <h1>{{ $history->body }}</h1>
                </div>
            </div>
            {{-- <button class="btn btn-sm dark:btn-neutral">Details</button> --}}
        </div>
    </div>
    @endforeach
    @endsection
