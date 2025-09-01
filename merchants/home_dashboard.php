<div id="dashboard" class="tab-section active p-3">
  <h4 class="mb-4">Your Previous Applications</h4>

  <!-- Row 1: Stats Cards -->
  <div class="row gx-4 gy-4 mb-4">
    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0 p-3">
        <div class="fw-semibold text-muted mb-1">Total Revenue</div>
        <div class="h5 text-success">$40,109</div>
        <div class="small text-secondary">+12.5% this week</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0 p-3">
        <div class="fw-semibold text-muted mb-1">Products Sold</div>
        <div class="h5 text-primary">1,951</div>
        <div class="small text-secondary">+3.2% increase</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0 p-3">
        <div class="fw-semibold text-muted mb-1">New Customers</div>
        <div class="h5 text-warning">4,514</div>
        <div class="small text-secondary">+5.8% growth</div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card shadow-sm border-0 p-3">
        <div class="fw-semibold text-muted mb-1">New Customers</div>
        <div class="h5 text-warning">4,514</div>
        <div class="small text-secondary">+5.8% growth</div>
      </div>
    </div>
  </div>

  <!-- Row 2: Application Status + Chart -->
  <div class="row gx-4 gy-4 mb-4">
    <div class="col-md-8">
      <div class="card shadow-sm border-0 p-3">
        <?php include 'previous_application_status.php' ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 p-3">
        <div class="fw-semibold mb-2">Weekly Stats</div>
        <canvas id="weeklyChart" height="200"></canvas>
      </div>
    </div>
  </div>

  <!-- Row 3: Notifications -->
  <div class="row gx-4 gy-4">
    <div class="col-md-8">
      <div class="card shadow-sm border-0 p-4">
        <div class="fw-semibold mb-3">Application Status</div>
        <ul class="list-group list-group-flush">
          <?php include 'application_status.php' ?>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0 p-3">
        <div class="fw-semibold mb-2">🔔 Notifications</div>
        <ul class="list-group list-group-flush">
          <?php if ($appData['coment']) : ?>
            <li class="list-group-item"><?= htmlspecialchars($appData['coment']) ?></li>
          <?php endif; ?>
          <?php if ($appData['kyccomment']) : ?>
            <li class="list-group-item">KYC: <?= htmlspecialchars($appData['kyccomment']) ?></li>
          <?php endif; ?>
          <?php if ($appData['documentscomment']) : ?>
            <li class="list-group-item">Business Documents: <?= htmlspecialchars($appData['documentscomment']) ?></li>
          <?php endif; ?>
          <?php if ($appData['bankcomment']) : ?>
            <li class="list-group-item">Bank Account: <?= htmlspecialchars($appData['bankcomment']) ?></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
