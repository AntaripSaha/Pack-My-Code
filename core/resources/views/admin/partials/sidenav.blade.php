<div class="sidebar bg--dark">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a class="sidebar__main-logo" href="{{ route('admin.dashboard') }}"><img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="@lang('image')"></a>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{ menuActive('admin.dashboard') }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.referral.index') }}">
                    <a class="nav-link" href="{{ route('admin.referral.index') }}">
                        <i class="menu-icon las la-sitemap"></i>
                        <span class="menu-title">@lang('Manage Referral')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.category.index') }}">
                    <a class="nav-link" href="{{ route('admin.category.index') }}">
                        <i class="menu-icon las la-bars"></i>
                        <span class="menu-title">@lang('Categories')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.subcategory.index') }}">
                    <a class="nav-link" href="{{ route('admin.subcategory.index') }}">
                        <i class="menu-icon las la-align-center"></i>
                        <span class="menu-title">@lang('Subcategories')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.category.feature.index') }}">
                    <a class="nav-link" href="{{ route('admin.category.feature.index') }}">
                        <i class="menu-icon las la-indent"></i>
                        <span class="menu-title">@lang('Category Features')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.level.index') }}">
                    <a class="nav-link" href="{{ route('admin.level.index') }}">
                        <i class="menu-icon las la-level-up-alt"></i>
                        <span class="menu-title">@lang('Author Level')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.reviewers*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon fas fa-briefcase-medical"></i>
                        <span class="menu-title">@lang('Manage Reviewers')</span>
                        @if ($bannedReviewersCount > 0 || $emailUnverifiedReviewersCount > 0 || $mobileUnverifiedReviewersCount > 0)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>

                    <div class="sidebar-submenu {{ menuActive('admin.reviewers*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.add') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.add') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Add Reviewer')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.active') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.active') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Active Reviewers')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.banned') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.banned') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned Reviewers')</span>
                                    @if ($bannedReviewersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $bannedReviewersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.email.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.email.unverified') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Unverified')</span>
                                    @if ($emailUnverifiedReviewersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $emailUnverifiedReviewersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.mobile.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.mobile.unverified') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Mobile Unverified')</span>
                                    @if ($mobileUnverifiedReviewersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $mobileUnverifiedReviewersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.all') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Reviewers')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.reviewers.notification.all') }}">
                                <a class="nav-link" href="{{ route('admin.reviewers.notification.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Notification to All')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.users*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-users"></i>
                        <span class="menu-title">@lang('Manage Users')</span>

                        @if ($bannedUsersCount > 0 || $emailUnverifiedUsersCount > 0 || $mobileUnverifiedUsersCount > 0 || $kycUnverifiedUsersCount > 0 || $kycPendingUsersCount > 0)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.users*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.active') }}">
                                <a class="nav-link" href="{{ route('admin.users.active') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Active Users')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.banned') }}">
                                <a class="nav-link" href="{{ route('admin.users.banned') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned Users')</span>
                                    @if ($bannedUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $bannedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.email.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.users.email.unverified') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Unverified')</span>

                                    @if ($emailUnverifiedUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $emailUnverifiedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.mobile.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.users.mobile.unverified') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Mobile Unverified')</span>
                                    @if ($mobileUnverifiedUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $mobileUnverifiedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.kyc.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.users.kyc.unverified') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('KYC Unverified')</span>
                                    @if ($kycUnverifiedUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $kycUnverifiedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.kyc.pending') }}">
                                <a class="nav-link" href="{{ route('admin.users.kyc.pending') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('KYC Pending')</span>
                                    @if ($kycPendingUsersCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $kycPendingUsersCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.with.balance') }}">
                                <a class="nav-link" href="{{ route('admin.users.with.balance') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('With Balance')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.with.products') }}">
                                <a class="nav-link" href="{{ route('admin.users.with.products') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('With Products')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.featured.all') }}">
                                <a class="nav-link" href="{{ route('admin.users.featured.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Featured Author')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.all') }}">
                                <a class="nav-link" href="{{ route('admin.users.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Users')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.users.notification.all') }}">
                                <a class="nav-link" href="{{ route('admin.users.notification.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Notification to All')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.product*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon lab la-product-hunt"></i>
                        <span class="menu-title">@lang('All Products') </span>
                        @if ($pendingProductCount > 0 || $softProductCount > 0 || $hardProductCount > 0 || $updatePendingProductCount > 0 || $resubmitProductCount > 0)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.product*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.product.pending') }}">
                                <a class="nav-link" href="{{ route('admin.product.pending') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if ($pendingProductCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $pendingProductCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.product.approved') }}">
                                <a class="nav-link" href="{{ route('admin.product.approved') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.product.soft.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.product.soft.rejected') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Soft Rejected')</span>
                                    @if ($softProductCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $softProductCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.product.hard.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.product.hard.rejected') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Hard Rejected')</span>
                                    @if ($hardProductCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $hardProductCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.product.resubmitted') }}">
                                <a class="nav-link" href="{{ route('admin.product.resubmitted') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Resubmitted')</span>
                                    @if ($resubmitProductCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $resubmitProductCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.product.all') }}">
                                <a class="nav-link" href="{{ route('admin.product.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Products')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.update.product.pending') }}">
                    <a class="nav-link" href="{{ route('admin.update.product.pending') }}">
                        <i class="menu-icon las la-pen-square"></i>
                        <span class="menu-title">@lang('Update Product')</span>
                        @if ($updatePendingProductCount)
                            <span class="menu-badge pill bg--danger ms-auto">{{ $updatePendingProductCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.sell*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon lab la-sellsy"></i>
                        <span class="menu-title">@lang('Sell History')</span>
                        @if ($pendingPaymentsCount > 0)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.sell*', 2) }}">
                        <ul>

                            <li class="sidebar-menu-item {{ menuActive('admin.sell.pending') }}">
                                <a class="nav-link" href="{{ route('admin.sell.pending') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Sells')</span>
                                    @if ($pendingPaymentsCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $pendingPaymentsCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.sell.approved') }}">
                                <a class="nav-link" href="{{ route('admin.sell.approved') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Sells')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.sell.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.sell.rejected') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Sells')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.sell.all') }}">
                                <a class="nav-link" href="{{ route('admin.sell.all') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Sells')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.reviews.*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-star"></i>
                        <span class="menu-title">@lang('Manage Reviews') </span>
                        @if ($reportedReviewCount > 0)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.reviews.*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.reviews.index') }}">
                                <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Reviews')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.reviews.reported') }}">
                                <a class="nav-link" href="{{ route('admin.reviews.reported') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Reported Reviews')</span>
                                    @if ($reportedReviewCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $reportedReviewCount }}</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.comment*') }}">
                    <a class="nav-link" href="{{ route('admin.comment.index') }}">
                        <i class="menu-icon las la-comments"></i>
                        <span class="menu-title">@lang('Comments')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.gateway*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Payment Gateways')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.gateway*', 2) }}">
                        <ul>

                            <li class="sidebar-menu-item {{ menuActive('admin.gateway.automatic.*') }}">
                                <a class="nav-link" href="{{ route('admin.gateway.automatic.index') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Automatic Gateways')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.gateway.manual.*') }}">
                                <a class="nav-link" href="{{ route('admin.gateway.manual.index') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Manual Gateways')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.deposit*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-file-invoice-dollar"></i>
                        <span class="menu-title">@lang('Deposits')</span>
                        @if (0 < $pendingDepositsCount)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.deposit*', 2) }}">
                        <ul>

                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.pending') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.pending') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Deposits')</span>
                                    @if ($pendingDepositsCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $pendingDepositsCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.approved') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.approved') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Deposits')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.successful') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.successful') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Successful Deposits')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.rejected') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Deposits')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.initiated') }}">

                                <a class="nav-link" href="{{ route('admin.deposit.initiated') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Initiated Deposits')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.list') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.list') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Deposits')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.withdraw*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon la la-bank"></i>
                        <span class="menu-title">@lang('Withdrawals') </span>
                        @if (0 < $pendingWithdrawCount)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.withdraw*', 2) }}">
                        <ul>

                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.method.*') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.method.index') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Withdrawal Methods')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.pending') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.pending') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Withdrawals')</span>

                                    @if ($pendingWithdrawCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $pendingWithdrawCount }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.approved') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.approved') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved Withdrawals')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.rejected') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Rejected Withdrawals')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.log') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.log') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Withdrawals')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.ticket*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon la la-ticket"></i>
                        <span class="menu-title">@lang('Support Ticket') </span>
                        @if (0 < $pendingTicketCount)
                            <span class="menu-badge pill bg--danger ms-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.ticket*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.pending') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.pending') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending Ticket')</span>
                                    @if ($pendingTicketCount)
                                        <span class="menu-badge pill bg--danger ms-auto">{{ $pendingTicketCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.closed') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.closed') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Closed Ticket')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.answered') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.answered') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Answered Ticket')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.index') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.index') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Ticket')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.report*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title">@lang('Report') </span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.report*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive(['admin.report.transaction', 'admin.report.transaction.search']) }}">
                                <a class="nav-link" href="{{ route('admin.report.transaction') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Transaction Log')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive(['admin.report.login.history', 'admin.report.login.ipHistory']) }}">
                                <a class="nav-link" href="{{ route('admin.report.login.history') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('User Login History')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive(['admin.report.reviewer.login.history', 'admin.report.reviewer.login.ipHistory']) }}">
                                <a class="nav-link" href="{{ route('admin.report.reviewer.login.history') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Reviewer Login History')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.report.notification.history') }}">
                                <a class="nav-link" href="{{ route('admin.report.notification.history') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Notification History')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.report.commission.history') }}">
                                <a class="nav-link" href="{{ route('admin.report.commission.history') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Commission History')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.subscriber.*') }}">
                    <a class="nav-link" data-default-url="{{ route('admin.subscriber.index') }}" href="{{ route('admin.subscriber.index') }}">
                        <i class="menu-icon las la-thumbs-up"></i>
                        <span class="menu-title">@lang('Subscribers') </span>
                    </a>
                </li>

                <li class="sidebar__menu-header">@lang('Settings')</li>

                <li class="sidebar-menu-item {{ menuActive('admin.setting.index') }}">
                    <a class="nav-link" href="{{ route('admin.setting.index') }}">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('General Setting')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.setting.ftp') }}">
                    <a class="nav-link" href="{{ route('admin.setting.ftp') }}">
                        <i class="menu-icon lab la-foursquare"></i>
                        <span class="menu-title">@lang('FTP Settings')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.setting.system.configuration') }}">
                    <a class="nav-link" href="{{ route('admin.setting.system.configuration') }}">
                        <i class="menu-icon las la-cog"></i>
                        <span class="menu-title">@lang('System Configuration')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.setting.logo.icon') }}">
                    <a class="nav-link" href="{{ route('admin.setting.logo.icon') }}">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">@lang('Logo & Favicon')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.extensions.index') }}">
                    <a class="nav-link" href="{{ route('admin.extensions.index') }}">
                        <i class="menu-icon las la-cogs"></i>
                        <span class="menu-title">@lang('Extensions')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive(['admin.language.manage', 'admin.language.key']) }}">
                    <a class="nav-link" data-default-url="{{ route('admin.language.manage') }}" href="{{ route('admin.language.manage') }}">
                        <i class="menu-icon las la-language"></i>
                        <span class="menu-title">@lang('Language') </span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.seo') }}">
                    <a class="nav-link" href="{{ route('admin.seo') }}">
                        <i class="menu-icon las la-globe"></i>
                        <span class="menu-title">@lang('SEO Manager')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.kyc.setting') }}">
                    <a class="nav-link" href="{{ route('admin.kyc.setting') }}">
                        <i class="menu-icon las la-user-check"></i>
                        <span class="menu-title">@lang('KYC Setting')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.setting.notification*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-bell"></i>
                        <span class="menu-title">@lang('Notification Setting')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.setting.notification*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.global') }}">
                                <a class="nav-link" href="{{ route('admin.setting.notification.global') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Global Template')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.email') }}">
                                <a class="nav-link" href="{{ route('admin.setting.notification.email') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Setting')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.sms') }}">
                                <a class="nav-link" href="{{ route('admin.setting.notification.sms') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('SMS Setting')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.setting.notification.templates') }}">
                                <a class="nav-link" href="{{ route('admin.setting.notification.templates') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Notification Templates')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header">@lang('Frontend Manager')</li>

                <li class="sidebar-menu-item {{ menuActive('admin.frontend.templates') }}">
                    <a class="nav-link" href="{{ route('admin.frontend.templates') }}">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title">@lang('Manage Templates')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.frontend.manage.*') }}">
                    <a class="nav-link" href="{{ route('admin.frontend.manage.pages') }}">
                        <i class="menu-icon la la-list"></i>
                        <span class="menu-title">@lang('Manage Pages')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.frontend.sections*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon la la-puzzle-piece"></i>
                        <span class="menu-title">@lang('Manage Section')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.frontend.sections*', 2) }}">
                        <ul>
                            @php
                                $lastSegment = collect(request()->segments())->last();
                            @endphp
                            @foreach (getPageSections(true) as $k => $secs)
                                @if ($secs['builder'])
                                    <li class="sidebar-menu-item @if ($lastSegment == $k) active @endif">
                                        <a class="nav-link" href="{{ route('admin.frontend.sections', $k) }}">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">{{ __($secs['name']) }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header">@lang('Extra')</li>

                <li class="sidebar-menu-item {{ menuActive('admin.maintenance.mode') }}">
                    <a class="nav-link" href="{{ route('admin.maintenance.mode') }}">
                        <i class="menu-icon las la-robot"></i>
                        <span class="menu-title">@lang('Maintenance Mode')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.setting.cookie') }}">
                    <a class="nav-link" href="{{ route('admin.setting.cookie') }}">
                        <i class="menu-icon las la-cookie-bite"></i>
                        <span class="menu-title">@lang('GDPR Cookie')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.system*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon la la-server"></i>
                        <span class="menu-title">@lang('System')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.system*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.system.info') }}">
                                <a class="nav-link" href="{{ route('admin.system.info') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Application')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.system.server.info') }}">
                                <a class="nav-link" href="{{ route('admin.system.server.info') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Server')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.system.optimize') }}">
                                <a class="nav-link" href="{{ route('admin.system.optimize') }}">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Cache')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.setting.custom.css') }}">
                    <a class="nav-link" href="{{ route('admin.setting.custom.css') }}">
                        <i class="menu-icon lab la-css3-alt"></i>
                        <span class="menu-title">@lang('Custom CSS')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.request.report') }}">
                    <a class="nav-link" data-default-url="{{ route('admin.request.report') }}" href="{{ route('admin.request.report') }}">
                        <i class="menu-icon las la-bug"></i>
                        <span class="menu-title">@lang('Report & Request') </span>
                    </a>
                </li>
            </ul>
            <div class="text-uppercase mb-3 text-center">
                <span class="text--primary">{{ __(systemDetails()['name']) }}</span>
                <span class="text--success">@lang('V'){{ systemDetails()['version'] }} </span>
            </div>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
    <script>
        if ($('li').hasClass('active')) {
            $('#sidebar__menuWrapper').animate({
                scrollTop: eval($(".active").offset().top - 320)
            }, 500);
        }
    </script>
@endpush