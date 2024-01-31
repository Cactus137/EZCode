<div class="page-wrapper">
  <?php
  if (isset($_SESSION['notify-course'])) {
    echo '<div class="position-absolute end-0 mt-5">
                <div class="alert alert-' . $_SESSION['notify-course'][1] . ' alert-dismissible" role="alert" style="width: 300px;">
                  <div class="d-flex">
                    <div>'
      . $_SESSION['notify-course'][2] .
      '</div>
                  </div>
                  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
              </div>';

    echo '<script>
              const alert = document.querySelectorAll(\'.alert\');
              alert.forEach((item) => {
                setTimeout(function() {
                  item.remove();
                }, 7000);
              })
            </script>';
    unset($_SESSION['notify-course']);
  }
  ?>
  <!-- Page header -->
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Courses Management
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col-2">
          <a href="#" class="btn btn-primary w-100 px-0" data-bs-toggle="modal" data-bs-target="#modal-add">
            Add Course
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
                  <th>ID Course</th>
                  <th>Image</th>
                  <th>name</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th>status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-tbody">
                <?php
                $courses = $data['courses'];
                foreach ($courses as $course) :
                  extract($course);
                ?>
                  <tr>
                    <td><?= $id ?></td>
                    <td class="">
                      <span class="avatar me-2" style="background-image: url('<?= asset('img/courses/' . $thumbnail) ?>')"></span>
                    </td>
                    <td><?= $name ?></td>
                    <td><?= $price ?></td>
                    <td><?= $created_at ?></td>
                    <td class="sort-status text-center">
                      <div class="col-auto"><span class="badge bg-<?= $status == 1 ? "red" : "green"; ?> me-2"></span><?= $status == 1 ? "Hidden" : "Public"; ?></div>
                    </td>
                    <td>
                      <div class="btn-list flex-nowrap d-flex justify-content-center">
                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                          <a href="#" class="btn btn-vk w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-detail" data-course-id="<?= $id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                              <path d="M12 9h.01" />
                              <path d="M11 12h1v4h1" />
                            </svg>
                          </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                          <a href="#" class="btn btn-twitter w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-update" data-course-id="<?= $id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                              <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                              <path d="M16 5l3 3" />
                            </svg>
                          </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                          <a href="#" class="btn btn-pinterest w-100 btn-icon" data-bs-toggle="modal" data-bs-target="#modal-delete" data-course-id="<?= $id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M4 7l16 0" />
                              <path d="M10 11l0 6" />
                              <path d="M14 11l0 6" />
                              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer d-flex align-items-center">
          <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
          <ul class="pagination m-0 ms-auto">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
  <!-- Modal Add -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/admin/course/add-course" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name-add" placeholder="Name Course">
            </div>
            <div class="mb-3">
              <div class="form-label">Thumbnail</div>
              <input type="file" class="form-control" name="thumbnail-add" />
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input type="text" class="form-control" name="price-add" placeholder="Price Course">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Author</label>
                  <input type="text" class="form-control" name="author-add" placeholder="Author Course">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title-add" placeholder="Title Course">
            </div>
            <div class="mb-3 mb-0">
              <label class="form-label">Description</label>
              <textarea rows="5" class="form-control" name="description-add" placeholder="Here can be course description" value=""></textarea>
            </div>
            <div class="mb-3">
              <div class="form-label">Category</div>
              <select name="category-add" class="form-select">
                <option value="-1" selected>-- Category --</option>
                <?php
                $categories = $data['categories'];
                foreach ($categories as $key => $value) :
                ?>
                  <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="form-label">Status</div>
              <div>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" value="0" name="status-add" checked>
                  <span class="form-check-label">Public</span>
                </label>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" value="1" name="status-add">
                  <span class="form-check-label">Hidden</span>
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="btn-add-course" class="btn btn-primary">Add Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Update -->
  <div class="modal modal-blur fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/admin/course/update-course" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <input type="hidden" class="form-control" name="id-update">
            </div>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name-update" placeholder="Name Course">
            </div>
            <div class="mb-3">
              <div class="form-label">Thumbnail</div>
              <input type="file" class="form-control" name="thumbnail-update" />
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input type="text" class="form-control" name="price-update" placeholder="Price Course">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Author</label>
                  <input type="text" class="form-control" name="author-update" placeholder="Author Course">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title-update" placeholder="Title Course">
            </div>
            <div class="mb-3 mb-0">
              <label class="form-label">Description</label>
              <textarea rows="5" class="form-control" name="description-update" placeholder="Here can be course description" value=""></textarea>
            </div>
            <div class="mb-3">
              <div class="form-label">Category</div>
              <select name="category-update" class="form-select">
                <option value="-1" selected>-- Category --</option>
                <?php
                $categories = $data['categories'];
                foreach ($categories as $key => $value) :
                ?>
                  <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <div class="form-label">Status</div>
              <div>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" value="0" name="status-update">
                  <span class="form-check-label">Public</span>
                </label>
                <label class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" value="1" name="status-update">
                  <span class="form-check-label">Hidden</span>
                </label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="btn-update-course" class="btn btn-primary">Update Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Delete -->
  <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-danger"></div>
        <form action="/admin/course/delete-course" method="post">
          <div class="modal-body text-center py-4">
            <div class="mb-3">
              <input type="hidden" class="form-control" name="id-delete">
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
              <path d="M12 9v4" />
              <path d="M12 17h.01" />
            </svg>
            <h3>Are you sure?</h3>
            <div class="text-secondary">Do you really want to remove this course? What you've done cannot be undone.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" name="btn-delete-course" class="btn btn-primary">Delete Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Detail -->
  <div class="modal modal-blur fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <img class="detail-image rounded mb-3" src="" height="200px">
          </div>
          <p><strong>Name Course: </strong><span class="detail-name"></span></p>
          <p><strong>Price: </strong> 100$</p>
          <p><strong>Author: </strong><span class="detail-author"></span></p>
          <p><strong>Category: </strong><span class="detail-category"></span></p>
          <p><strong>Rating: </strong>
            <span class="gl-star-rating gl-star-rating--ltr" data-star-rating="">
              <?php for ($i = 0; $i < 5; $i++) : ?>
                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
              <?php endfor; ?>
            </span> <span class="detail-number_of_participants"></span>
          </p>
          <p><strong>Date created: </strong><span class="detail-created_at"></span></p>
          <p>
            <strong>Description: </strong><br>
            <span class="detail-description"></span>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn ms-auto" data-bs-dismiss="modal">Close</button>
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
      const detailButtons = document.querySelectorAll('.btn-vk');
      const editButtons = document.querySelectorAll('.btn-twitter');
      const deleteButtons = document.querySelectorAll('.btn-pinterest');
      // Detail
      detailButtons.forEach(function(button) {
        const courseId = button.dataset.courseId;
        const modal = document.querySelector('#modal-detail');
        const image = modal.querySelector('.detail-image');
        const name = modal.querySelector('.detail-name');
        const author = modal.querySelector('.detail-author');
        const category = modal.querySelector('.detail-category');
        const created_at = modal.querySelector('.detail-created_at');
        const description = modal.querySelector('.detail-description');
        const numberRate = modal.querySelector('.detail-number_of_participants');

        button.addEventListener('click', function() {
          fetch(`http://localhost:8000/api/course/${courseId}`)
            .then(response => response.json())
            .then(response => {
              image.src = `<?= asset('img/courses/') ?>${response[0].thumbnail}`;
              name.innerHTML = response[0].name;
              author.innerHTML = response[0].author;
              category.innerHTML = response[0].category;
              created_at.innerHTML = response[0].created_at;
              description.innerHTML = response[0].description;
              numberRate.innerHTML = '  (' + response[0].number_of_participants + ')';
            });
        });
      });
      // Update
      editButtons.forEach(function(button) {
        const courseId = button.dataset.courseId;
        const modal = document.querySelector('#modal-update');
        const idInput = modal.querySelector('input[name="id-update"]');
        const nameInput = modal.querySelector('input[name="name-update"]');
        const priceInput = modal.querySelector('input[name="price-update"]');
        const authorInput = modal.querySelector('input[name="author-update"]');
        const titleInput = modal.querySelector('input[name="title-update"]');
        const descriptionInput = modal.querySelector('textarea[name="description-update"]');
        const statusInput = modal.querySelectorAll('input[name="status-update"]');
        const categoryInput = modal.querySelectorAll('select[name="category-update"] option');

        button.addEventListener('click', function() {
          fetch(`http://localhost:8000/api/course/${courseId}`)
            .then(response => response.json())
            .then(response => {
              idInput.value = response[0].id;
              nameInput.value = response[0].name;
              priceInput.value = response[0].price;
              authorInput.value = response[0].author;
              titleInput.value = response[0].title;
              descriptionInput.value = response[0].description;
              statusInput[response[0].status].checked = true;
              categoryInput.forEach(function(category) {
                if (category.value == response[0].id_category) {
                  category.selected = true;
                }
              });
            });
        });
      });

      // Delete
      deleteButtons.forEach(function(button) {
        const courseId = button.dataset.courseId;
        const modal = document.querySelector('#modal-delete');
        const idInput = modal.querySelector('input[name="id-delete"]');

        button.addEventListener('click', function() {
          idInput.value = courseId;
        });
      });
    });
  </script>