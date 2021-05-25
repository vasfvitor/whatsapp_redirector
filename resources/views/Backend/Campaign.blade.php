@extends('.Backend.layout.app')
@section('title', __('system.campaign'))
@section('btn')
    <ul class="menu-nav">
        <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active" data-menu-toggle="click" aria-haspopup="true">
            <a href="{{ url('/addGroup/'.$campaign->id) }}" class="btn btn-light-site font-weight-bold">
                <i class="fas fa-plus"></i>
                {{__('system.add_group')}}
            </a>
        </li>
    </ul>
@endsection

@section('mobileBtn')
    <ul class="menu-nav">
        <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active" data-menu-toggle="click" aria-haspopup="true">
            <a href="{{ url('/addGroup/'.$campaign->id) }}" class="btn btn-light-site font-weight-bold">
                <i class="fas fa-plus"></i>
                {{__('system.add_group')}}
            </a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
                <input type="hidden" id="message" value="{{ session()->pull('message') }}">
            @else
                <input type="hidden" id="message">
            @endif
                <div class="container">
                    <div class="row">
                        @foreach($groups as $group)
                            <div class="col-md-4">
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-end">
                                            <div class="dropdown dropdown-inline dropdownCardBtn_{{$group->id}} dropdownCard" data-id="{{$group->id}}" data-toggle="tooltip" title="" data-placement="left">
                                                <a href="#" class="btn btn-hover-light-site btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor text-site"></i>
                                                </a>
                                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right dropdownCard dropdownCardDiv_{{$group->id}}" style="">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi navi-hover p-5">
                                                        <li class="navi-item navi-item-site">
                                                            <a href="{{ url('/editGroup/'.$group->id) }}" class="navi-link navi-item-site">
																		<span class="navi-text">
																			<span><i class="fas fa-edit"></i> {{ __('system.edit') }}</span>
																		</span>
                                                            </a>
                                                        </li>

                                                        <li class="navi-item navi-item-site">
                                                            <a data-id="{{ $group->id }}" class="navi-link navi-item-site campaignDelete">
																		<span class="navi-text">
																			<span><i class="fas fa-trash-alt"></i> {{ __('system.delete') }}</span>
																		</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!--end::Navigation-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Pic-->
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                                <div class="symbol symbol-circle symbol-lg-75">
                                                    <img src="{{ asset('public/storage/uploads'.$campaign->icon) }}" class="img-fluid" alt="">
                                                </div>
                                                <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                                    <span class="font-size-h3 font-weight-boldest"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">JM</font></font></span>
                                                </div>
                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column">
                                                <a href="{{ $group->whatsapp_link }}" class="text-dark font-weight-bold text-hover-success font-size-h4 mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $group->name }}</font></font></a>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <p></p>
                                        <div>
                                            <span id="link-to-redirect-2070"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $group->whatsapp_link }}</font></font></span>
                                            <a class="btn btn-clean btn-hover-light-success btn-sm btn-icon copyBtn" data-value="{{ $group->whatsapp_link }}" data-clipboard="true" data-clipboard-target="#link-to-redirect-2070" data-toggle="tooltip" data-placement="top" data-original-title="Clique para copiar o link da campanha">
                                                <span class="navi-icon"><i class="flaticon2-copy text-site"></i></span>
                                            </a>

                                        </div>
                                        <p></p>
                                        @php
                                        if($group->total_redirects == 0)
                                            $progress = 0;
                                        else
                                            $progress = (($group->total_redirects * 100) / $group->access_limit)
                                        @endphp
                                        <div class="mb-7">
                                            <div class="d-flex flex-row-fluid align-items-center">
                                                <div class="progress progress-xs mt-2 mb-2 w-100">
                                                    <div class="progress-bar {{ $progress >= 100 ? 'bg-danger' : 'bg-warning' }}" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="ml-3 font-weight-bolder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ round($progress, 2) }}%</font></font></span>
                                            </div>
                                        </div>
                                        <div class="mb-7">
                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 font-weight-bolder mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('system.redirects')}}:</font></font></span>
                                                <a href="#" class="text-muted text-hover-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $group->access_limit }}</font></font></a>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{__('system.performed')}}:</font></font></span>
                                                <span class="text-muted font-weight-bold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $group->total_redirects }}</font></font></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('.campaignDelete').on('click', function() {
            let id = $(this).data('id');

            Swal.fire({
                icon: 'warning',
                title: '{{ __('system.delete_warning') }}',
                showCancelButton: true,
                confirmButtonText: `{{ __('system.yes_delete') }}`,
                cancelButtonText: `{{ __('system.no_delete') }}`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.replace('{{ url('/deleteGroup') }}/'+id);
                } else if (result.isDenied) {
                    return false;
                }
            })
        })

        $(function () {
            $('.dropdownCard').on('click', function() {
                let id = $(this).data('id');
                setTimeout(function () {
                    if($('.dropdownCardBtn_'+id).hasClass('show')) {
                        $('.dropdownCardBtn_'+id).removeClass('show');
                        $('.dropdownCardDiv_'+id).removeClass('show');
                    } else {
                        $('.dropdownCard').removeClass('show');
                        $('.dropdownCardBtn_'+id).addClass('show');
                        $('.dropdownCardDiv_'+id).addClass('show');
                        $('.dropdownCardDiv_'+id).css('position', 'absolute');
                        $('.dropdownCardDiv_'+id).css('transform', 'translate3d(-219px, 31px, 0px)');
                        $('.dropdownCardDiv_'+id).css('top', '0px');
                        $('.dropdownCardDiv_'+id).css('left', '0px');
                    }
                }, 10)
            })

            let message = $('#message').val();
            if(message == 'campaign_added') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: '{{ __('system.campaign_added') }}'
                })
            } else if(message == 'failed') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: '{{ __('system.try_again') }}'
                })
            } else if(message == 'group_success') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: '{{ __('system.group_added') }}'
                })
            } else if(message == 'delete_success') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: '{{ __('system.delete_success') }}'
                })
            }
        })

        $('.copyBtn').on('click', function() {
            let value = $(this).data('value');
            let tempInput = document.createElement("input");
            tempInput.style = "position: absolute; left: -1000px; top: -1000px";
            tempInput.value = value;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ __('system.link_copied') }}'
            })
        })
    </script>
@endpush


