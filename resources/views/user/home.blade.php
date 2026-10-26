@include('user.header')

<style>
    .balance-hero {
        background: linear-gradient(135deg, #2b113d 0%, #4d2a6a 32%, #8150c0 58%, #c78432 100%);
        box-shadow: 0 24px 60px rgba(56, 28, 77, 0.18);
    }

    .balance-hero::before,
    .balance-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        opacity: 0.9;
    }

    .balance-hero::before {
        width: 260px;
        height: 260px;
        right: -70px;
        top: -70px;
        background: rgba(255,255,255,0.08);
        filter: blur(10px);
    }

    .balance-hero::after {
        width: 230px;
        height: 230px;
        left: -40px;
        bottom: -80px;
        background: rgba(255,255,255,0.05);
        filter: blur(18px);
    }

    .info-tile {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .dashboard-card {
        background: linear-gradient(180deg, #ffffff 0%, #f9f7fd 100%);
        border: 1px solid rgba(109, 59, 130, 0.08);
    }

    .quick-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .quick-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(42, 31, 67, 0.08);
        border-color: rgba(109, 59, 130, 0.18) !important;
    }

    .transaction-row {
        transition: transform 0.2s ease, background-color 0.2s ease, border-color 0.2s ease;
    }

    .transaction-row:hover {
        transform: translateX(2px);
        background-color: #fff !important;
        border-color: rgba(109, 59, 130, 0.12) !important;
    }

    .premium-card {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 35%, #111827 100%);
        box-shadow: 0 24px 40px rgba(79, 70, 229, 0.25);
    }

    @media (max-width: 767.98px) {
        .balance-hero .display-5 {
            font-size: 2.3rem !important;
        }
    }
</style>

<div class="container-fluid py-4 px-2 px-md-4">
    @if(Auth::user()->user_status)
        <div class="alert alert-danger d-flex align-items-start gap-3 rounded-4 shadow-sm mb-4" role="alert">
            <i class="fas fa-flag mt-1" aria-hidden="true"></i>
            <div>
                <h5 class="alert-heading mb-1">Your account has been flagged</h5>
                <p class="mb-0">Some account activity may be restricted. Please contact the administrator for assistance.</p>
            </div>
        </div>
    @endif

    <div class="row g-4 align-items-stretch">
        <div class="col-lg-8">
            <div class="card border-0 rounded-4 shadow-lg overflow-hidden h-100 position-relative balance-hero">
                <div class="card-body p-4 p-lg-4 position-relative z-1 text-white">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4 pb-3 border-bottom border-white border-opacity-10">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-white bg-opacity-10 border border-white border-opacity-25 d-flex align-items-center justify-content-center" style="width:42px; height:42px;">
                                <i class="fas fa-university"></i>
                            </div>
                            <div>
                                <div class="small text-white-50 text-uppercase fw-semibold">Welcome back</div>
                                <h3 class="mb-0 fw-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                            </div>
                        </div>

                        <span class="badge rounded-pill px-3 py-2 text-white border border-white border-opacity-25" style="background: rgba(255,255,255,0.08);">
                            {{ Auth::user()->account_type ?? 'Savings Account' }}
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
                        <div>
                            <div class="text-uppercase small text-white-50 fw-semibold mb-2">Available balance</div>
                            <h1 class="mb-0 fw-bold display-5" id="mainBalanceDisplay" style="letter-spacing:-1px;">
                                {{ Auth::user()->currency }}{{ number_format($balance ?? Auth::user()->balance ?? 0, 2) }}
                            </h1>
                        </div>

                        <div class="form-check form-switch d-flex align-items-center gap-2 mb-0 px-3 py-2 rounded-pill border border-white border-opacity-25" style="background: rgba(255,255,255,0.06);">
                            <input class="form-check-input mt-0" type="checkbox" id="balanceToggle" checked>
                            <label class="form-check-label text-white-50 small mb-0" for="balanceToggle">Show</label>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="rounded-4 p-3 h-100 info-tile">
                                <div class="small text-white-50 text-uppercase mb-2">Account number</div>
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <span class="fw-semibold text-white">{{ Auth::user()->account_number }}</span>
                                    <button type="button" class="btn btn-link p-0 text-info" onclick="navigator.clipboard.writeText('{{ Auth::user()->account_number }}'); alert('Account number copied!');" title="Copy Account Number">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="rounded-4 p-3 h-100 info-tile">
                                <div class="small text-white-50 text-uppercase mb-2">Currency</div>
                                <div class="fw-semibold text-white">{{ Auth::user()->currency }}</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="rounded-4 p-3 h-100 info-tile">
                                <div class="small text-white-50 text-uppercase mb-2">SWIFT</div>
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <span class="fw-semibold text-white">TPSTUS33</span>
                                    <button type="button" class="btn btn-link p-0 text-info" onclick="navigator.clipboard.writeText('TPSTUS33'); alert('SWIFT copied!');" title="Copy SWIFT Code">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('user.deposit.index') }}" class="btn btn-light rounded-pill px-4 fw-bold text-dark">Deposit</a>
                        <a href="{{ route('user.transfer.bank') }}" class="btn btn-outline-light rounded-pill px-4 fw-bold">Transfer</a>
                        <a href="{{ route('user.transactions') }}" class="btn btn-outline-light rounded-pill px-4 fw-bold">Activity</a>
                        @if(Auth::user()->payment_status == 1)
                            <a href="{{ route('user.payments.index') }}" class="btn rounded-pill px-4 fw-bold text-white border border-white border-opacity-25" style="background: rgba(255,255,255,0.08);">Make Payment</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-3 dashboard-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 fw-bold text-dark">Digital Debit Card</h6>
                    <a href="{{ route('user.cards.card') }}" class="small text-primary text-decoration-none fw-semibold">Manage</a>
                </div>

                @forelse($details as $detail)
                    @if($detail->status == 0)
                        <div class="rounded-4 p-3 text-white mb-3 shadow-sm" style="background: linear-gradient(135deg, #1f2937, #0f172a);">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-warning bg-opacity-25 text-warning p-3 rounded-circle">
                                    <i class="fas fa-hourglass-half"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold text-white">Card Under Review</h6>
                                    <small class="text-white-50">Your card is being processed.</small>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="rounded-4 p-3 text-white mb-3 shadow-lg position-relative overflow-hidden premium-card">
                            <div style="position:absolute; right:-40px; top:-30px; width:160px; height:160px; background:rgba(255,255,255,0.08); border-radius:50%;"></div>
                            <div class="position-relative z-1">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold">Primesaversbnk</span>
                                    <i class="fab fa-cc-mastercard fa-2x"></i>
                                </div>
                                <div class="mb-3">
                                    <div class="fw-bold font-monospace" style="letter-spacing: 2px; font-size: 1.15rem;">
                                        {{ implode(' ', str_split($detail->card_number, 4)) }}
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <small class="text-white-50 d-block text-uppercase">Cardholder</small>
                                        <div class="fw-semibold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-white-50 d-block text-uppercase">Expires</small>
                                        <div class="fw-semibold font-monospace">{{ \Carbon\Carbon::parse($detail->card_expiry)->format('m/y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="text-center py-4 bg-light rounded-4 border border-dashed">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3">
                            <i class="fas fa-credit-card fa-2x"></i>
                        </div>
                        <h6 class="fw-bold mb-2">No active card</h6>
                        <p class="text-muted small mb-3">Issue a new card to start spending.</p>
                        <a href="{{ route('user.cards.request.card', Auth::user()->id) }}" class="btn btn-primary btn-sm rounded-pill px-4">Issue Card</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-bold text-dark">Recent Transactions</h6>
                        <a href="{{ route('user.transactions') }}" class="btn btn-sm btn-light rounded-pill px-3 fw-semibold">View All</a>
                    </div>

                    @if($transaction->isEmpty())
                        <div class="text-center text-muted py-5">
                            <i class="fas fa-receipt fa-2x mb-2"></i>
                            <p class="mb-0">No recent transactions on record.</p>
                        </div>
                    @else
                        @foreach($transaction as $details)
                            <div class="d-flex align-items-center justify-content-between p-3 mb-2 rounded-3 border bg-light-subtle transaction-row">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                        @if($details->transaction == 'Bank Transfer')
                                            <i class="fas fa-exchange-alt"></i>
                                        @elseif($details->transaction == 'Loan')
                                            <i class="fas fa-hand-holding-usd"></i>
                                        @elseif($details->transaction == 'Card')
                                            <i class="fas fa-credit-card"></i>
                                        @elseif($details->transaction == 'Crypto Withdrawal')
                                            <i class="fab fa-bitcoin"></i>
                                        @elseif($details->transaction == 'Paypal Withdrawal')
                                            <i class="fab fa-paypal"></i>
                                        @elseif($details->transaction == 'Skrill Withdrawal')
                                            <i class="fas fa-wallet"></i>
                                        @else
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">{{ Str::limit($details->transaction_description, 28) }}</div>
                                        <small class="text-muted">{{ $details->transaction }}</small>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <div class="fw-bold font-monospace {{ in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']) ? 'text-danger' : 'text-success' }}">
                                        {{ in_array($details->transaction, ['Bank Transfer', 'Paypal Withdrawal', 'Skrill Withdrawal', 'Crypto Withdrawal']) ? '-' : '+' }}{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                    </div>
                                    <span class="badge rounded-pill {{ $details->transaction_status == '1' ? 'bg-success-subtle text-success' : ($details->transaction_status == '0' ? 'bg-warning-subtle text-warning' : 'bg-danger-subtle text-danger') }}">
                                        {{ $details->transaction_status == '1' ? 'Successful' : ($details->transaction_status == '0' ? 'Pending' : 'Failed') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-bold text-dark">Monthly Cash Flow</h6>
                        <small class="text-muted">{{ now()->format('M Y') }}</small>
                    </div>

                    <div class="chart-container" style="height: 180px; position: relative;">
                        <canvas id="debitCreditChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="row g-2 text-center">
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <div class="small text-muted">Debit</div>
                                    <div class="fw-bold text-danger">{{ Auth::user()->currency }}{{ number_format($debit_transfers, 2) }}</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light rounded-3 p-2">
                                    <div class="small text-muted">Credit</div>
                                    <div class="fw-bold text-success">{{ Auth::user()->currency }}{{ number_format($credit_transfers, 2) }}</div>
                                </div>
                            </div>
                        </div>

                        @php
                            $net_balance = $credit_transfers - $debit_transfers;
                        @endphp
                        <div class="mt-3 p-3 rounded-3 bg-light d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">Net Balance</small>
                                <div class="fw-bold {{ $net_balance >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ Auth::user()->currency }}{{ number_format(abs($net_balance), 2) }}
                                </div>
                            </div>
                            <span class="badge rounded-pill {{ $net_balance >= 0 ? 'bg-success' : 'bg-danger' }} text-white">
                                {{ $net_balance >= 0 ? 'Surplus' : 'Deficit' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-bold text-dark">Quick Services</h6>
                        <span class="badge bg-light text-muted rounded-pill">Fast access</span>
                    </div>

                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-3">
                        <div class="col">
                            <a href="{{ route('user.deposit.index') }}" class="text-decoration-none text-dark d-block p-3 rounded-4 border text-center h-100 bg-light shadow-sm quick-card">
                                <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 46px; height: 46px;">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="fw-semibold">Deposit</div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.transfer.bank') }}" class="text-decoration-none text-dark d-block p-3 rounded-4 border text-center h-100 bg-light shadow-sm quick-card">
                                <div class="rounded-circle bg-info text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 46px; height: 46px;">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <div class="fw-semibold">Transfer</div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.withdrawal.crypto') }}" class="text-decoration-none text-dark d-block p-3 rounded-4 border text-center h-100 bg-light shadow-sm quick-card">
                                <div class="rounded-circle bg-warning text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 46px; height: 46px;">
                                    <i class="fab fa-bitcoin"></i>
                                </div>
                                <div class="fw-semibold">Crypto</div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.loans.loan') }}" class="text-decoration-none text-dark d-block p-3 rounded-4 border text-center h-100 bg-light shadow-sm quick-card">
                                <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 46px; height: 46px;">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <div class="fw-semibold">Loan</div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.withdrawal.paypal') }}" class="text-decoration-none text-dark d-block p-3 rounded-4 border text-center h-100 bg-light shadow-sm hover-lift" style="transition: all 0.2s ease;">
                                <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 46px; height: 46px;">
                                    <i class="fab fa-paypal"></i>
                                </div>
                                <div class="fw-semibold">PayPal</div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.skrill') }}" class="text-decoration-none text-dark d-block p-3 rounded-4 border text-center h-100 bg-light shadow-sm hover-lift" style="transition: all 0.2s ease;">
                                <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 46px; height: 46px;">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <div class="fw-semibold">Skrill</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="requestFormModal" tabindex="-1" aria-labelledby="requestFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 bg-light rounded-top-4">
                <h5 class="modal-title fw-bold text-dark" id="requestFormModalLabel"><i class="fas fa-truck text-primary me-2"></i> Card Delivery Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="requestForm" action="{{ route('user.cards.requestcard.delivery') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="fullName" class="form-label fw-semibold">Full Name</label>
                        <input type="text" class="form-control rounded-3" id="fullName" name="fname" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="houseAddress" class="form-label fw-semibold">Delivery Address</label>
                        <input type="text" class="form-control rounded-3" id="houseAddress" name="address" placeholder="Full street address, City, Country" required>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label fw-semibold">Contact Phone Number</label>
                        <input type="tel" class="form-control rounded-3" id="phoneNumber" name="phone" value="{{ Auth::user()->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control rounded-3" id="emailAddress" name="emailAddress" value="{{ Auth::user()->email }}" required>
                    </div>
                </div>

                <div class="modal-footer border-0 bg-light rounded-bottom-4">
                    <button type="button" class="btn btn-secondary btn-sm rounded-3 fw-bold" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm rounded-3 fw-bold px-4">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const balanceToggle = document.getElementById('balanceToggle');
    const mainBalanceDisplay = document.getElementById('mainBalanceDisplay');
    const actualBalance = @json(Auth::user()->currency . number_format($balance ?? Auth::user()->balance ?? 0, 2));

    if (balanceToggle && mainBalanceDisplay) {
        balanceToggle.addEventListener('change', function () {
            if (this.checked) {
                mainBalanceDisplay.textContent = actualBalance;
            } else {
                mainBalanceDisplay.textContent = @json(Auth::user()->currency . ' ••••••••');
            }
        });
    }

    const ctx = document.getElementById('debitCreditChart');
    if (ctx) {
        new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Debit', 'Credit'],
                datasets: [{
                    data: [{{ $debit_transfers }}, {{ $credit_transfers }}],
                    backgroundColor: ['#ef4444', '#10b981'],
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return '{{ Auth::user()->currency }}' + Number(context.raw).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.05)' },
                        ticks: {
                            callback: function (value) {
                                return '{{ Auth::user()->currency }}' + Number(value).toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    }
});
</script>

@include('user.footer')
