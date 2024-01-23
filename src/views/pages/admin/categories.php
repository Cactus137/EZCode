<div class="page-wrapper">
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Category Management
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col-2">
          <a href="#" class="btn btn-primary w-100 px-0" data-bs-toggle="modal" data-bs-target="#modal-report">
            Add Category
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-body">
          <div id="table-default" class="table-responsive">
            <table class="table table table-vcenter card-table">
              <thead>
                <tr>
                  <th><button class="table-sort" data-sort="sort-id">ID Category</button></th>
                  <th>thumbnail</th>
                  <th><button class="table-sort" data-sort="sort-name">name</button></th>
                  <th><button class="table-sort" data-sort="sort-date">Date</button></th>
                  <th><button class="table-sort text-center ps-5 ms-1" data-sort="sort-status">status</button></th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-tbody">
                <?php for ($i = 0; $i < 10; $i++) : ?>
                  <tr>
                    <td class="sort-id"><?= chr(rand(65, 90)); ?></td>
                    <td class="">
                      <span class="avatar me-2" style="background-image: url(./static/avatars/006m.jpg)"></span>
                    </td>
                    <td class="sort-name"><?= chr(rand(65, 90)); ?></td>
                    <td class="sort-date" data-date="<?= mt_rand() ?>"><?= mt_rand() ?></td>
                    <td class="sort-status text-center" data-status="<?php $status = rand(1, 2);
                                                                      echo $status ?>">
                      <div class="col-auto"><span class="badge bg-<?= $status == 1 ? "red" : "green"; ?> me-2"></span><?= $status == 1 ? "Hidden" : "Public"; ?></div>

                    </td>
                    <td>
                      <div class="btn-list flex-nowrap">
                        <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-report1">
                          Edit
                        </a>
                        <a href="#" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#modal-danger">
                          Delete
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endfor; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer d-flex align-items-center">
          <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
          <ul class="pagination m-0 ms-auto">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M15 6l-6 6l6 6" />
                </svg>
                prev
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                next
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M9 6l6 6l-6 6" />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
          </div>
          <div class="mb-3">
            <div class="form-label">Thumbnail</div>
            <input type="file" class="form-control" />
          </div>
          <div class="mb-3">
            <div class="form-label">Status</div>
            <div>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radios-inline" checked>
                <span class="form-check-label">Public</span>
              </label>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radios-inline">
                <span class="form-check-label">Hidden</span>
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            Add category
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-report1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
          </div>
          <div class="mb-3">
            <div class="form-label">Thumbnail</div>
            <input type="file" class="form-control" />
          </div>
          <div class="mb-3">
            <div class="form-label">Status</div>
            <div>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radios-inline" checked>
                <span class="form-check-label">Public</span>
              </label>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radios-inline">
                <span class="form-check-label">Hidden</span>
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 12l5 5l10 -10" />
            </svg>
            Update category
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-danger"></div>
        <div class="modal-body text-center py-4">
          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
            <path d="M12 9v4" />
            <path d="M12 17h.01" />
          </svg>
          <h3>Are you sure?</h3>
          <div class="text-secondary">Do you really want to remove this category? What you've done cannot be undone.</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                  Cancel
                </a></div>
              <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                  Delete category
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Libs JS -->
  <script src="<?= asset('libs/list.js/dist/list.js') ?>" defer></script>
  <!-- Tabler Core --> 
  <script src="<?= asset('js/tabler.js') ?>" defer></script>
  <script src="<?= asset('js/demo.js') ?>" defer></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const list = new List('table-default', {
        sortClass: 'table-sort',
        listClass: 'table-tbody',
        valueNames: ['sort-id', 'sort-name',
          {
            attr: 'data-date',
            name: 'sort-date'
          },
          {
            attr: 'data-status',
            name: 'sort-status'
          }
        ]
      });
    })
  </script>