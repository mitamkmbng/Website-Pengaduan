<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Aduan</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <form method="post" action="<?php echo site_url('pimpinan/filterData'); ?>">
        <input type="date" name="start_date" class="form-control" style="width: 20%" placeholder="Start Date" required>
        <input type="date" name="end_date" class="form-control" style="width: 20%" placeholder="End Date" required>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <?php if (isset($filtered_data)): ?>
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Aduan</th>
                  <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($filtered_data as $row) : ?>
                  <tr>
                    <td><?php echo date('d-m-Y', strtotime($row->tgl)) ?></td>
                    <td><?php echo $row->aduan; ?></td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </div>