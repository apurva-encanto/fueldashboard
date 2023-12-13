 <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

         <li class="nav-item">
             <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                 <i class="nav-icon fas fa-th"></i>
                 <p>
                     DASHBOARD
                 </p>
             </a>
         </li>

         <li class="nav-item">
             <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-building"></i>
                 <p>
                     BUSINESS
                     <i class="right fas fa-angle-left"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="<?= base_url('admin/add-business') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add BUSINESS</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/list-business') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List Business</p>
                     </a>
                 </li>

             </ul>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-users"></i>
                 <p>
                     Clients
                     <i class="right fas fa-angle-left"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="<?= base_url('admin/add-client') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Clients</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/list-client') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List Clients</p>
                     </a>
                 </li>

             </ul>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-building"></i>
                 <p>
                     Company
                     <i class="right fas fa-angle-left"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="<?= base_url('admin/add-company') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Company</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/list-company') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List Company</p>
                     </a>
                 </li>

             </ul>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-building"></i>
                 <p>
                     Department
                     <i class="right fas fa-angle-left"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="<?= base_url('admin/add-department') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Department</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/list-department') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List Department</p>
                     </a>
                 </li>

             </ul>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link">
                 <i class="nav-icon fas fa-car"></i>
                 <p>
                     Vehicles
                     <i class="right fas fa-angle-left"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="<?= base_url('admin/add-vehicles') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Vehicles</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('admin/list-vehicles') ?>" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>List Vehicles</p>
                     </a>
                 </li>

             </ul>

         </li>

         <li class="nav-item">
             <a href="<?= base_url('admin/search') ?>" class="nav-link">
                 <i class="nav-icon fas fa-search"></i>
                 <p> Search </p>
             </a>
         </li>

         <li class="nav-header">Reports</li>
         <li class="nav-item">
             <a href="<?= base_url('admin/report/import') ?>" class="nav-link">
                 <i class="nav-icon fas fa-file-alt"></i>
                 <p>
                     Report
                     <span class="badge badge-info right">2</span>
                 </p>
             </a>
         </li>

     </ul>
 </nav>