@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        @if (isset($_SESSION['notify-account']))
            <div class="position-absolute end-0 mt-5">
                <div id="alert-notify" class="alert alert-{{ $_SESSION['notify-account'][1] }} alert-dismissible"
                    role="alert" style="width: 300px;">
                    <div class="d-flex">
                        <div>{{ $_SESSION['notify-account'][2] }}</div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            </div>
            @php
                unset($_SESSION['notify-account']);
            @endphp
        @endif
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
                        <a href="#" class="btn btn-primary w-100 px-0" data-bs-toggle="modal"
                            data-bs-target="#modal-add">
                            Add Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-mobile-md card-table">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['accounts'] as $account)
                                            @php
                                                extract($account);
                                            @endphp

                                            <tr>
                                                <td data-label="Name">
                                                    <div class="d-flex py-1 align-items-center">
                                                        <span class="avatar me-2"
                                                            style="background-image: url('{{ asset('img/accounts/' . $avatar) }}')"></span>
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium">{{ $username }}</div>
                                                            <div class="text-secondary">{{ $email }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-secondary">
                                                    {{ $fullname }}
                                                </td>
                                                <td class="text-secondary">
                                                    {{ $role === 1 ? 'Admin' : 'Client' }}
                                                </td>
                                                <td>
                                                    <div class="col-auto">
                                                        <span
                                                            class="badge bg-{{ $status == 1 ? 'red' : 'green' }} me-2"></span>
                                                        {{ $status == 1 ? 'Hidden' : 'Public' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap d-flex justify-content-center">
                                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                            <a href="#" class="btn btn-twitter w-100 btn-icon"
                                                                data-bs-toggle="modal" data-bs-target="#modal-update"
                                                                data-account-id="{{ $id }}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                            <a href="#" class="btn btn-pinterest w-100 btn-icon"
                                                                aria-label="Youtube" data-bs-toggle="modal"
                                                                data-bs-target="#modal-delete"
                                                                data-account-id="{{ $id }}">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries
                        </p>
                        <ul class="pagination m-0 ms-auto">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-chevron-left"></i>
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
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/account/add-account" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="mb-3">
                                            <input type="text" value="" name="username-add"
                                                class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fullname</label>
                                        <input type="text" class="form-control" name="fullname-add"
                                            placeholder="Fullname">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Avatar</div>
                                <input type="file" class="form-control" name="avatar-add" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email-add" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password-add" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-label">Role</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="0"
                                                    name="role-add" checked>
                                                <span class="form-check-label">Client</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="1"
                                                    name="role-add">
                                                <span class="form-check-label">Admin</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-label">Status</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="0"
                                                    name="status-add" checked>
                                                <span class="form-check-label">Public</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="1"
                                                    name="status-add">
                                                <span class="form-check-label">Hidden</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="btn-add-account" class="btn btn-primary">Add Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/admin/account/update-account" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="hidden" value="" name="id-update" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="mb-3">
                                            <input type="text" value="" name="username-update"
                                                class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fullname</label>
                                        <input type="text" class="form-control" name="fullname-update"
                                            placeholder="Fullname">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Avatar</div>
                                <input type="file" class="form-control" name="avatar-update" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email-update" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password-update"
                                    placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-label">Role</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="0"
                                                    name="role-update">
                                                <span class="form-check-label">Client</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="1"
                                                    name="role-update">
                                                <span class="form-check-label">Admin</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="form-label">Status</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="0"
                                                    name="status-update">
                                                <span class="form-check-label">Public</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="1"
                                                    name="status-update">
                                                <span class="form-check-label">Hidden</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="btn-update-account" class="btn btn-primary">Update
                                Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <form action="/admin/account/delete-account" method="post">
                        <div class="modal-body text-center py-4">
                            <div class="mb-3">
                                <input type="hidden" value="" name="id-delete" class="form-control">
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                <path d="M12 9v4" />
                                <path d="M12 17h.01" />
                            </svg>
                            <h3>Are you sure?</h3>
                            <div class="text-secondary">Do you really want to remove this account? What you've done cannot
                                be undone.</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="btn-delete-account" class="btn btn-primary">Delete
                                Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('libs/list.js/dist/list.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('js/tabler.js') }}" defer></script>
    <script src="{{ asset('js/demo.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.btn-twitter');
            const deleteButtons = document.querySelectorAll('.btn-pinterest');

            // Update
            editButtons.forEach(function(button) {
                const accountId = button.dataset.accountId;
                const modal = document.querySelector('#modal-update');
                const idInput = modal.querySelector('input[name="id-update"]');
                const usernameInput = modal.querySelector('input[name="username-update"]');
                const fullnameInput = modal.querySelector('input[name="fullname-update"]');
                const emailInput = modal.querySelector('input[name="email-update"]');
                const passwordInput = modal.querySelector('input[name="password-update"]');
                const roleInput = modal.querySelectorAll('input[name="role-update"]');
                const statusInput = modal.querySelectorAll('input[name="status-update"]');

                button.addEventListener('click', function() {
                    fetch(`http://localhost:8000/api/account/${accountId}`)
                        .then(response => response.json())
                        .then(response => {
                            idInput.value = response[0].id;
                            usernameInput.value = response[0].username;
                            fullnameInput.value = response[0].fullname;
                            emailInput.value = response[0].email;
                            passwordInput.value = response[0].password;
                            console.log(roleInput);
                            console.log(response[0].role);
                            roleInput[response[0].role].checked = true;
                            statusInput[response[0].status].checked = true;
                        });
                });
            });

            // Delete
            deleteButtons.forEach(function(button) {
                const accountId = button.dataset.accountId;
                const modal = document.querySelector('#modal-delete');
                const idInput = modal.querySelector('input[name="id-delete"]');

                button.addEventListener('click', function() {
                    idInput.value = accountId;
                });
            });
        });

        const alert = document.querySelectorAll('#alert-notify');
        alert.forEach((item) => {
            setTimeout(function() {
                item.remove();
            }, 7000);
        });
    </script>
@endsection
