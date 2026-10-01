<?php
use yii\helpers\Url;
?> <!-- ============ LIST VIEW ============ -->
<section id="view-list" class="tab-pane fade show active" role="tabpanel">
  <div class="page-head d-flex flex-wrap justify-content-between align-items-end gap-3">
    <div>
      <h1>Students</h1>
      <p>View, search and manage every enrolled student.</p>
    </div>
    <a href="<?= Url::to(['student/create']) ?>" data-view="create" class="btn btn-brand"><i
        class="bi bi-plus-lg me-1"></i>Create student</a>
  </div>

  <!-- <div class="row g-3 mb-4">
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-people"></i></div><div><b id="stTotal">6</b><span>Total students</span></div></div></div>
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-check2-circle"></i></div><div><b id="stActive">3</b><span>Active</span></div></div></div>
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-hourglass-split"></i></div><div><b id="stPending">2</b><span>Pending approval</span></div></div></div>
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-book"></i></div><div><b>5</b><span>Courses</span></div></div></div>
    </div> -->

  <div class="panel">
    <div class="toolbar row g-2 align-items-center">
      <div class="col-md-6">
        <div class="input-group">
          <span class="input-group-text bg-white border-end-0" style="border-radius:10px 0 0 10px"><i
              class="bi bi-search"></i></span>
          <input id="search" type="search" class="form-control border-start-0"
            placeholder="Search by name, email or roll no.">
        </div>
      </div>
      <div class="col-6 col-md-3">
        <select id="filterCourse" class="form-select">
          <option value="">All courses</option>
          <option>Computer Science</option>
          <option>Mechanical</option>
          <option>Business Admin</option>
          <option>Design</option>
          <option>Biotech</option>
        </select>
      </div>
      <div class="col-6 col-md-3">
        <select id="filterStatus" class="form-select">
          <option value="">All statuses</option>
          <option>Active</option>
          <option>Pending</option>
          <option>Inactive</option>
        </select>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Student</th>
            <th>Phone</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody id="rows">



          <?php foreach ($students as $student): ?>

            <tr data-id="1" data-first="Aarav" data-last="Sharma" data-email="aarav@example.com"
              data-phone="+91 98100 11122" data-roll="STU-1001" data-course="Computer Science" data-status="Active"
              data-dob="2004-03-14" data-gender="gM" data-address="Meerut, Uttar Pradesh">
              <td class="cell-student">
                <div class="d-flex align-items-center gap-3">
                  <?php if (!empty($student->profile)): ?>

                    <img src="<?= Yii::getAlias('@web/uploads/students/' . $student->profile) ?>" alt="Profile Image"
                      width="50" style="object-fit: cover;" class="rounded border">
                  <?php else: ?>
                    <div class="avatar" style="background:#3b5bdb"><?= strtoupper(substr($student->name, 0, 2)) ?></div>
                  <?php endif; ?>




                  <div>
                    <div class="name"><?= $student->name ?></div>
                    <div class="sub"><?= $student->email ?></div>
                  </div>
                </div>
              </td>

              <td data-label="Phone"><?= $student->phone ?></td>
              <td data-label="Status"><span
                  class="pill pill-active"><?= $student->status == 1 ? 'Active' : 'Inactive' ?></span></td>
              <td class="text-end text-nowrap cell-actions">


                <a href="<?= Url::to(['student/update', 'id' => $student->id]) ?>" class="icon-btn" data-view="edit"
                  title="Edit Aarav"><i class="bi bi-pencil"></i></a>

                <button type="button" class="icon-btn danger" data-bs-toggle="modal" data-bs-target="#delModal"
                  data-name="Aarav Sharma" title="Delete <?= $student->name ?>"><i class="bi bi-trash"></i></button>

                <!-- Delete modal -->
                <div class="modal fade" id="delModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius:16px">
                      <div class="modal-body p-4">
                        <h5 class="fw-bold">Delete <span id="delName"></span>?</h5>
                        <p class="text-muted mb-4">This removes the student and their records. You can't undo this.</p>
                        <div class="d-flex justify-content-end gap-2">
                          <button class="btn btn-ghost" data-bs-dismiss="modal">Keep student</button>
                          <a href="<?= Url::to(['student/delete', 'id' => $student->id]) ?>"
                            class="btn btn-danger fw-semibold" id="delConfirm" style="border-radius:10px">Delete
                            student</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
    <div id="empty" class="empty d-none"><i class="bi bi-search fs-2"></i>
      <p class="mt-2 mb-0">No students match your search. Try a different name or clear the filters.</p>
    </div>

    <?= $this->render('//common/_pagination', [
    'pagination' => $pagination,
]) ?>

    <!-- <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 border-top">
        <span class="small text-muted" id="count">Showing 6 of 6 students</span>
        <ul class="pagination pagination-sm mb-0">
          <li class="page-item disabled"><a class="page-link" href="#" data-view="list">Previous</a></li>
          <li class="page-item active"><a class="page-link" href="#" data-view="list">1</a></li>
          <li class="page-item"><a class="page-link" href="#" data-view="list">2</a></li>
          <li class="page-item"><a class="page-link" href="#" data-view="list">Next</a></li>
        </ul>
      </div> -->


  </div>
</section>