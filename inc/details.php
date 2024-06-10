<!-- Modal Details -->
<div class="modal fade" id="<?php echo $modal_id; ?>" tabindex="-1" aria-labelledby="searchLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchLabel"><i class="bi bi-eye-fill"></i> Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-lg-6 rounded">
                            <img src="assets/img/uploads/<?php echo $data['gambar_barang']; ?>" class="img-fluid"
                                alt="Product Image">
                        </div>
                        <div class="col-lg-6 mt-4">
                            <h2 class="fw-bold"><?php echo $data['nama_barang']; ?></h2>

                            <h3 class="my-4"><?php echo $formatted_harga; ?>/Hari</h3>
                            <p class="mb-4">A short introduction to the product goes here.</p>
                            <!-- <div class="d-flex gap-3 mb-4">
                                <input type="number" class="form-control" value="1" style="max-width: 80px;">
                                <button class="btn btn-primary" type="button">Add to Cart</button>
                            </div> -->
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-1" id="productTab<?php echo $modal_id; ?>" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab-<?php echo $modal_id; ?>"
                                data-bs-toggle="tab" data-bs-target="#description-<?php echo $modal_id; ?>"
                                type="button" role="tab" aria-controls="description-<?php echo $modal_id; ?>"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specs-tab-<?php echo $modal_id; ?>" data-bs-toggle="tab"
                                data-bs-target="#specs-<?php echo $modal_id; ?>" type="button" role="tab"
                                aria-controls="specs-<?php echo $modal_id; ?>"
                                aria-selected="false">Specifications</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab-<?php echo $modal_id; ?>" data-bs-toggle="tab"
                                data-bs-target="#reviews-<?php echo $modal_id; ?>" type="button" role="tab"
                                aria-controls="reviews-<?php echo $modal_id; ?>" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabContent<?php echo $modal_id; ?>">
                        <div class="tab-pane fade show active" id="description-<?php echo $modal_id; ?>" role="tabpanel"
                            aria-labelledby="description-tab-<?php echo $modal_id; ?>">
                            <p class="mt-3">
                                Here's where you'd include detailed information about the product. This could be a
                                long-form text that goes into depth about the product's features, the problems it
                                solves, and any other
                                relevant details a potential customer might want to know before making a purchase.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="specs-<?php echo $modal_id; ?>" role="tabpanel"
                            aria-labelledby="specs-tab-<?php echo $modal_id; ?>">
                            <table class="table mt-3">
                                <tr>
                                    <th>Weight</th>
                                    <td>1kg</td>
                                </tr>
                                <tr>
                                    <th>Dimensions</th>
                                    <td>10 x 20 x 5 cm</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="reviews-<?php echo $modal_id; ?>" role="tabpanel"
                            aria-labelledby="reviews-tab-<?php echo $modal_id; ?>">
                            <div class="mt-3">
                                <h5>John Doe</h5>
                                <p>I loved this product! It really changed the way I work.</p>
                                <h5>Jane Smith</h5>
                                <p>Great quality and excellent after-sales service.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" id="searchBtn" class="btn btn-outline-warning shadow-none">Search</button>
            </div> -->
        </div>
    </div>
</div>