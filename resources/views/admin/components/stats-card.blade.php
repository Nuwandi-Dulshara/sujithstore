<div class="col-md-3 col-sm-6">
    <div class="stats-card text-white p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mb-0">{{ $count }}</h3>
                <small>{{ $title }}</small>
            </div>
            <i class="bi {{ $icon ?? 'bi-bar-chart' }} fs-2"></i>
        </div>
    </div>
</div>

<style>
.stats-card{
    background:linear-gradient(135deg,var(--ks-blue),#3b4fd0);
    border-radius:14px;
    transition:.3s;
}
.stats-card:hover{
    transform:translateY(-5px);
}
</style>
