<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">

            <li>
                <a href="{{ route('admin.index') }}"><i class="fa fa-user-plus"></i><span
                        class="right-nav-text">Admin</span> </a>
            </li>

            <li>
                <a href="{{ route('user.index') }}"><i class="fa fa-user-o"></i><span class="right-nav-text">User</span>
                </a>
            </li>

            <li>
                <a href="{{ route('tag.index') }}"><i class="fa fa-tag"></i><span class="right-nav-text">Tag</span> </a>
            </li>

            <li>
                <a href="{{ route('category.index') }}"><i class="fa fa-user-o"></i><span
                        class="right-nav-text">Category</span> </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"><i class="fa fa-product-hunt"></i><span
                        class="right-nav-text">Products</span> </a>
            </li>
            <!-- menu item chat-->
            <li>

                <a href="{{route('userorders')}}"><i class="ti-comments"></i><span class="right-nav-text">Orders

                <a href="{{route('make-order')}}"><i class="fa fa-cart-plus"></i><span class="right-nav-text">Cart

                    </span></a>
            </li>
        </ul>
    </div>
</div>
