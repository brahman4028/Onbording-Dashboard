<div class="card border shadow-sm p-4">
  <h5 class="mb-3">API Keys & Webhooks</h5>
  <p class="text-muted">Manage your integration credentials and webhook URLs.</p>

  <!-- Live Mode Keys -->
  <h6 class="mt-4">Live Mode</h6>
  <p class="text-muted small">Use these credentials for real transactions.</p>

  <div class="row g-3 mb-3">
    <div class="col-md-6">
      <label class="form-label">Private Key</label>
      <div class="input-group">
        <input type="text" class="form-control" value="sk_live_*****************" readonly>
        <button class="btn btn-outline-secondary" type="button">Copy</button>
      </div>
    </div>
    <div class="col-md-6">
      <label class="form-label">Public Key</label>
      <div class="input-group">
        <input type="text" class="form-control" value="pk_live_*****************" readonly>
        <button class="btn btn-outline-secondary" type="button">Copy</button>
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label">Callback URL</label>
      <input type="text" class="form-control" value="https://yourdomain.com/api/callback" readonly>
    </div>
    <div class="col-md-6">
      <label class="form-label">Webhook URL</label>
      <input type="text" class="form-control" value="https://yourdomain.com/api/webhook" readonly>
    </div>
  </div>

  <div class="d-flex justify-content-between mt-3">
    <button class="btn btn-outline-primary">Generate New Keys</button>
    <button class="btn btn-success">Save Changes</button>
  </div>

  <hr class="my-4">

  <!-- Test Mode Keys -->
  <h6>Test Mode</h6>
  <p class="text-muted small">Use these only for testing and development.</p>

  <div class="alert alert-warning small">
    <strong>Note:</strong> Never use test keys in production.
  </div>

  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Test Private Key</label>
      <div class="input-group">
        <input type="text" class="form-control" value="sk_test_*****************" readonly>
        <button class="btn btn-outline-secondary" type="button">Copy</button>
      </div>
    </div>
    <div class="col-md-6">
      <label class="form-label">Test Public Key</label>
      <div class="input-group">
        <input type="text" class="form-control" value="pk_test_*****************" readonly>
        <button class="btn btn-outline-secondary" type="button">Copy</button>
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label">Test Callback URL</label>
      <input type="text" class="form-control" value="https://sandbox.yourdomain.com/api/callback" readonly>
    </div>
    <div class="col-md-6">
      <label class="form-label">Test Webhook URL</label>
      <input type="text" class="form-control" value="https://sandbox.yourdomain.com/api/webhook" readonly>
    </div>
  </div>
  <div class="d-flex justify-content-between mt-3">
    <button class="btn btn-outline-primary">Generate New Keys</button>
    <button class="btn btn-success">Save Changes</button>
  </div>

</div>
