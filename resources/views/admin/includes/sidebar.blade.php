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
                <a href="{{ route('tag.index') }}"><i class="fa fa-tag"></i><span class="right-nav-text">Tag</span>
                </a>
            </li>
            <li>
                <a href="{{ route('category.index') }}"><i class="fa fa-user-o"></i><span
                        class="right-nav-text">Category</span> </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"><i class="fa fa-product-hunt"></i><span
                        class="right-nav-text">Products</span> </a>
            </li>
            <li>
                <a href="{{ route('userorders') }}"><i class="ti-search"></i><span class="right-nav-text"> Check Orders
                        <a href="{{ route('make-order') }}"><i class="ti-shopping-cart"></i><span
                                class="right-nav-text">Cart
                            </span></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#order-menu">
                    <div class="pull-left"><i class="ti-package"></i><span class="right-nav-text">Orders</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="order-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('orders') }}">All Orders</a> </li>
                    <li> <a href="{{ route('processingOrders') }}">processing</a> </li>
                    <li> <a href="{{ route('outOfDeliveryOrders') }}">Out of Delivery</a> </li>
                    <li> <a href="{{ route('doneOrders') }}">Done</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
