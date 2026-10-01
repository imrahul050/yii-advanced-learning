  <!-- ============ LIST VIEW ============ -->
  <section id="view-list" class="tab-pane fade show active" role="tabpanel">
    <div class="page-head d-flex flex-wrap justify-content-between align-items-end gap-3">
      <div>
        <h1>Students</h1>
        <p>View, search and manage every enrolled student.</p>
      </div>
      <a href="#" data-view="create" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i>Create student</a>
    </div>

    <div class="row g-3 mb-4">
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-people"></i></div><div><b id="stTotal">6</b><span>Total students</span></div></div></div>
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-check2-circle"></i></div><div><b id="stActive">3</b><span>Active</span></div></div></div>
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-hourglass-split"></i></div><div><b id="stPending">2</b><span>Pending approval</span></div></div></div>
      <div class="col-6 col-lg-3"><div class="panel stat"><div class="stat-icon"><i class="bi bi-book"></i></div><div><b>5</b><span>Courses</span></div></div></div>
    </div>

    <div class="panel">
      <div class="toolbar row g-2 align-items-center">
        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0" style="border-radius:10px 0 0 10px"><i class="bi bi-search"></i></span>
            <input id="search" type="search" class="form-control border-start-0" placeholder="Search by name, email or roll no.">
          </div>
        </div>
        <div class="col-6 col-md-3">
          <select id="filterCourse" class="form-select"><option value="">All courses</option><option>Computer Science</option><option>Mechanical</option><option>Business Admin</option><option>Design</option><option>Biotech</option></select>
        </div>
        <div class="col-6 col-md-3">
          <select id="filterStatus" class="form-select"><option value="">All statuses</option><option>Active</option><option>Pending</option><option>Inactive</option></select>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead><tr><th>Student</th><th>Roll no.</th><th>Course</th><th>Phone</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
          <tbody id="rows">




          <tr data-id="1" data-first="Aarav" data-last="Sharma" data-email="aarav@example.com" data-phone="+91 98100 11122" data-roll="STU-1001" data-course="Computer Science" data-status="Active" data-dob="2004-03-14" data-gender="gM" data-address="Meerut, Uttar Pradesh">
            <td class="cell-student"><div class="d-flex align-items-center gap-3">
              <div class="avatar" style="background:#3b5bdb">AS</div>
              <div><div class="name">Aarav Sharma</div><div class="sub">aarav@example.com</div></div></div></td>
            <td data-label="Roll no.">STU-1001</td>
            <td data-label="Course">Computer Science</td>
            <td data-label="Phone">+91 98100 11122</td>
            <td data-label="Status"><span class="pill pill-active">Active</span></td>
            <td class="text-end text-nowrap cell-actions">
              <a href="#" class="icon-btn" data-view="edit" title="Edit Aarav"><i class="bi bi-pencil"></i></a>
              <button type="button" class="icon-btn danger" data-bs-toggle="modal" data-bs-target="#delModal" data-name="Aarav Sharma" title="Delete Aarav"><i class="bi bi-trash"></i></button>
            </td>
          </tr>

        
        </tbody>
        </table>
      </div>
      <div id="empty" class="empty d-none"><i class="bi bi-search fs-2"></i><p class="mt-2 mb-0">No students match your search. Try a different name or clear the filters.</p></div>

      <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 border-top">
        <span class="small text-muted" id="count">Showing 6 of 6 students</span>
        <ul class="pagination pagination-sm mb-0">
          <li class="page-item disabled"><a class="page-link" href="#" data-view="list">Previous</a></li>
          <li class="page-item active"><a class="page-link" href="#" data-view="list">1</a></li>
          <li class="page-item"><a class="page-link" href="#" data-view="list">2</a></li>
          <li class="page-item"><a class="page-link" href="#" data-view="list">Next</a></li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ============ CREATE / UPDATE VIEW (shared form) ============ -->
  <section id="view-form" class="tab-pane fade" role="tabpanel">
    <div class="page-head">
      <div class="crumbs"><a href="#" data-view="list">Students</a> / <span id="crumb">Create student</span></div>
      <h1 id="formTitle">Create student</h1>
      <p id="formSub">Fill in the details below to add a new student.</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-8">
        <form id="studentForm" class="panel needs-validation" novalidate>
          <div class="form-section">
            <h2>Personal details</h2>
            <p class="hint">Use the name exactly as it appears on official documents.</p>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label" for="first">First name</label><input id="first" class="form-control" required><div class="invalid-feedback">Enter a first name.</div></div>
              <div class="col-md-6"><label class="form-label" for="last">Last name</label><input id="last" class="form-control" required><div class="invalid-feedback">Enter a last name.</div></div>
              <div class="col-md-6"><label class="form-label" for="dob">Date of birth</label><input id="dob" type="date" class="form-control" required><div class="invalid-feedback">Choose a date of birth.</div></div>
              <div class="col-md-6">
                <label class="form-label d-block">Gender</label>
                <div class="d-flex gap-3 pt-2">
                  <div class="form-check"><input class="form-check-input" type="radio" name="gender" id="gM" checked><label class="form-check-label" for="gM">Male</label></div>
                  <div class="form-check"><input class="form-check-input" type="radio" name="gender" id="gF"><label class="form-check-label" for="gF">Female</label></div>
                  <div class="form-check"><input class="form-check-input" type="radio" name="gender" id="gO"><label class="form-check-label" for="gO">Other</label></div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-section">
            <h2>Contact</h2>
            <p class="hint">We use these to send notices and fee reminders.</p>
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label" for="email">Email</label><input id="email" type="email" class="form-control" placeholder="name@example.com" required><div class="invalid-feedback">Enter a valid email address.</div></div>
              <div class="col-md-6"><label class="form-label" for="phone">Phone</label><input id="phone" type="tel" class="form-control" placeholder="+91 98765 43210" required><div class="invalid-feedback">Enter a phone number.</div></div>
              <div class="col-12"><label class="form-label" for="address">Address</label><textarea id="address" rows="2" class="form-control"></textarea></div>
            </div>
          </div>

          <div class="form-section">
            <h2>Enrollment</h2>
            <p class="hint">Course and status decide where the student appears in reports.</p>
            <div class="row g-3">
              <div class="col-md-4"><label class="form-label" for="roll">Roll no.</label><input id="roll" class="form-control" placeholder="STU-1010" required><div class="invalid-feedback">Enter a roll number.</div></div>
              <div class="col-md-4"><label class="form-label" for="course">Course</label>
                <select id="course" class="form-select" required><option value="">Select course</option><option>Computer Science</option><option>Mechanical</option><option>Business Admin</option><option>Design</option><option>Biotech</option></select><div class="invalid-feedback">Select a course.</div></div>
              <div class="col-md-4"><label class="form-label" for="status">Status</label>
                <select id="status" class="form-select"><option>Active</option><option>Pending</option><option>Inactive</option></select></div>
              <div class="col-12">
                <label class="form-label">Profile photo</label>
                <label class="upload w-100 mb-0"><i class="bi bi-cloud-arrow-up fs-3 d-block"></i>Click to upload a JPG or PNG, up to 2 MB<input type="file" accept="image/*" hidden></label>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <a href="#" data-view="list" class="btn btn-ghost">Cancel</a>
            <button type="submit" class="btn btn-brand" id="saveBtn">Save student</button>
          </div>
        </form>
      </div>

      <aside class="col-lg-4">
        <div class="panel side-note">
          <h3>Before you save</h3>
          <p>Roll numbers must be unique. Students marked <b>Pending</b> can log in only after an admin approves them.</p>
          <p class="mb-0">You can change any of these details later from the Students list.</p>
        </div>
      </aside>
    </div>
  </section>