@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th>@lang('Product Name')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Comment')</th>
                                    <th>@lang('Created at')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($comments as $comment)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.product.detail', $comment->product_id) }}">
                                                {{ __(@$comment->product->name) }}
                                            </a>
                                        </td>

                                        <td>
                                            <span class="fw-bold">
                                                {{ @$comment->user->fullname }}<br>
                                                <a href="{{ route('admin.users.detail', $comment->user_id) }}">
                                                    <span>@</span>{{ @$comment->user->username }}
                                                </a>
                                            </span>
                                        </td>

                                        <td>
                                            <span>{{ strLimit($comment->comment, 60) }}</span>
                                        </td>

                                        <td>
                                            <span>{{ showDateTime($comment->created_at) }} <br> {{ diffForHumans($comment->created_at) }}</span>
                                        </td>

                                        <td>
                                            <button class="btn btn-sm btn-outline--info viewBtn" data-review="{{ $comment->comment }}" type="button">
                                                <i class="las la-desktop text--shadow"></i> @lang('View')
                                            </button>

                                            <a class="btn btn-sm btn-outline--primary" href="{{ route('admin.comment.replies', $comment->id) }}"><i class="las la-comment-dots"></i> @lang('Replies')</a>

                                            <button class="btn btn-sm btn-outline--danger confirmationBtn" data-action="{{ route('admin.comment.delete', $comment->id) }}" data-question="@lang('Are you sure remove this review?')" data-btn_class="btn btn--primary" type="button">
                                                <i class="las la-trash text--shadow"></i> @lang('Delete')
                                            </button>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($comments->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($comments) }}
                    </div>
                @endif
            </div>
        </div>

    </div>

    <div class="modal fade" id="viewModal" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Comment')</h4>
                    <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close"><i class="las la-times"></i></button>
                </div>
                <div class="modal-body">
                    <p class="modal-detail"></p>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <x-search-form placeholder="Search here" />
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.viewBtn').on('click', function() {
                var modal = $('#viewModal');
                modal.find('.modal-detail').text($(this).data('review'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
