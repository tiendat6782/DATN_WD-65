import Header from "./Layout/Home/Header"
import Footer from "./Layout/Home/Footer"
const DetailPage = () => {
  return (
    <div>
        <Header/>
        <section className="banner-area organic-breadcrumb">
          <div className="container">
            <div className="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
              <div className="col-first">
                <h1>Product Details Page</h1>
                <nav className="d-flex align-items-center">
                  <a href="index.html">
                    Home<span className="lnr lnr-arrow-right"></span>
                  </a>
                  <a href="#">
                    Shop<span className="lnr lnr-arrow-right"></span>
                  </a>
                  <a href="single-product.html">product-details</a>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <div className="product_image_area">
          <div className="container">
            <div className="row s_product_inner">
              <div className="col-lg-6">
                <div className="s_Product_carousel">
                  <div className="single-prd-item">
                    <img
                      className="img-fluid"
                      src="src/assets/img/category/s-p1.jpg"
                      alt=""
                    />
                  </div>
                  {/* <div className="single-prd-item">
                    <img
                      className="img-fluid"
                      src="src/assets/img/category/s-p1.jpg"
                      alt=""
                    />
                  </div>
                  <div className="single-prd-item">
                    <img
                      className="img-fluid"
                      src="src/assets/img/category/s-p1.jpg"
                      alt=""
                    />
                  </div> */}
                </div>
              </div>
              <div className="col-lg-5 offset-lg-1">
                <div className="s_product_text">
                  <h3>Faded SkyBlu Denim Jeans</h3>
                  <h2>$149.99</h2>
                  <ul className="list">
                    <li>
                      <a className="active" href="#">
                        <span>Category</span> : Household
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span>Availibility</span> : In Stock
                      </a>
                    </li>
                  </ul>
                  <p>
                    Mill Oil is an innovative oil filled radiator with the most
                    modern technology. If you are looking for something that can
                    make your interior look awesome, and at the same time give you
                    the pleasant warm feeling during the winter.
                  </p>
                  <div className="product_count">
                    <label htmlFor="qty">Quantity:</label>
                    <input
                      type="text"
                      name="qty"
                      id="sst"
                      maxLength={12}
                      value="1"
                      title="Quantity:"
                      className="input-text qty"
                    />
                    <button className="increase items-count" type="button">
                      <i className="lnr lnr-chevron-up"></i>
                    </button>
                    <button className="reduced items-count" type="button">
                      <i className="lnr lnr-chevron-down"></i>
                    </button>
                  </div>
                  <div className="card_area d-flex align-items-center">
                    <a className="primary-btn" href="#">
                      Add to Cart
                    </a>
                    <a className="icon_btn" href="#">
                      <i className="lnr lnr lnr-diamond"></i>
                    </a>
                    <a className="icon_btn" href="#">
                      <i className="lnr lnr lnr-heart"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <section className="product_description_area">
              <div className="container">
                  <ul className="nav nav-tabs" id="myTab" role="tablist">
                      <li className="nav-item">
                          <a className="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                      </li>
                      <li className="nav-item">
                          <a className="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                          aria-selected="false">Specification</a>
                      </li>
                      <li className="nav-item">
                          <a className="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                          aria-selected="false">Comments</a>
                      </li>
                      <li className="nav-item">
                          <a className="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                          aria-selected="false">Reviews</a>
                      </li>
                  </ul>
                  <div className="tab-content" id="myTabContent">
                      <div className="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
                              and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
                              Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
                              London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
                              officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
                              job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
                              showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
                              child’s painting set for her birthday and it was with this that she produced her first significant work, a
                              half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
                              named ‘Hangover’ by Beryl’s husband and</p>
                          <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
                              more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
                              the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
                              more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
                              streamlined plan of cooking that is more efficient for one person creating less</p>
                      </div>
                      <div className="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div className="table-responsive">
                              <table className="table">
                                  <tbody>
                                      <tr>
                                          <td>
                                              <h5>Width</h5>
                                          </td>
                                          <td>
                                              <h5>128mm</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>Height</h5>
                                          </td>
                                          <td>
                                              <h5>508mm</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>Depth</h5>
                                          </td>
                                          <td>
                                              <h5>85mm</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>Weight</h5>
                                          </td>
                                          <td>
                                              <h5>52gm</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>Quality checking</h5>
                                          </td>
                                          <td>
                                              <h5>yes</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>Freshness Duration</h5>
                                          </td>
                                          <td>
                                              <h5>03days</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>When packeting</h5>
                                          </td>
                                          <td>
                                              <h5>Without touch of hand</h5>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <h5>Each Box contains</h5>
                                          </td>
                                          <td>
                                              <h5>60pcs</h5>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div className="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                          <div className="row">
                              <div className="col-lg-6">
                                  <div className="comment_list">
                                      <div className="review_item">
                                          <div className="media">
                                              <div className="d-flex">
                                                  <img src="src/assets/img/product/review-1.png" alt=""/>
                                              </div>
                                              <div className="media-body">
                                                  <h4>Blake Ruiz</h4>
                                                  <h5>12th Feb, 2018 at 05:56 pm</h5>
                                                  <a className="reply_btn" href="#">Reply</a>
                                              </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                              commodo</p>
                                      </div>
                                      <div className="review_item reply">
                                          <div className="media">
                                              <div className="d-flex">
                                                  <img src="src/assets/img/product/review-2.png" alt=""/>
                                              </div>
                                              <div className="media-body">
                                                  <h4>Blake Ruiz</h4>
                                                  <h5>12th Feb, 2018 at 05:56 pm</h5>
                                                  <a className="reply_btn" href="#">Reply</a>
                                              </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                              commodo</p>
                                      </div>
                                      <div className="review_item">
                                          <div className="media">
                                              <div className="d-flex">
                                                  <img src="src/assets/img/product/review-3.png" alt=""/>
                                              </div>
                                              <div className="media-body">
                                                  <h4>Blake Ruiz</h4>
                                                  <h5>12th Feb, 2018 at 05:56 pm</h5>
                                                  <a className="reply_btn" href="#">Reply</a>
                                              </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                              commodo</p>
                                      </div>
                                  </div>
                              </div>
                              <div className="col-lg-6">
                                  <div className="review_box">
                                      <h4>Post a comment</h4>
                                      <form className="row contact_form" action="contact_process.php" method="post" id="contactForm" noValidate>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <input type="text" className="form-control" id="name" name="name" placeholder="Your Full name"/>
                                              </div>
                                          </div>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <input type="email" className="form-control" id="email" name="email" placeholder="Email Address"/>
                                              </div>
                                          </div>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <input type="text" className="form-control" id="number" name="number" placeholder="Phone Number"/>
                                              </div>
                                          </div>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <textarea className="form-control" name="message" id="message" rows={1} placeholder="Message"></textarea>
                                              </div>
                                          </div>
                                          <div className="col-md-12 text-right">
                                              <button type="submit" value="submit" className="btn primary-btn">Submit Now</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div className="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                          <div className="row">
                              <div className="col-lg-6">
                                  <div className="row total_rate">
                                      <div className="col-6">
                                          <div className="box_total">
                                              <h5>Overall</h5>
                                              <h4>4.0</h4>
                                              <h6>(03 Reviews)</h6>
                                          </div>
                                      </div>
                                      <div className="col-6">
                                          <div className="rating_list">
                                              <h3>Based on 3 Reviews</h3>
                                              <ul className="list">
                                                  <li><a href="#">5 Star <i className="fa fa-star"></i><i className="fa fa-star"></i><i className="fa fa-star"></i><i
                                                          className="fa fa-star"></i><i className="fa fa-star"></i> 01</a></li>
                                                  <li><a href="#">4 Star <i className="fa fa-star"></i><i className="fa fa-star"></i><i className="fa fa-star"></i><i
                                                          className="fa fa-star"></i><i className="fa fa-star"></i> 01</a></li>
                                                  <li><a href="#">3 Star <i className="fa fa-star"></i><i className="fa fa-star"></i><i className="fa fa-star"></i><i
                                                          className="fa fa-star"></i><i className="fa fa-star"></i> 01</a></li>
                                                  <li><a href="#">2 Star <i className="fa fa-star"></i><i className="fa fa-star"></i><i className="fa fa-star"></i><i
                                                          className="fa fa-star"></i><i className="fa fa-star"></i> 01</a></li>
                                                  <li><a href="#">1 Star <i className="fa fa-star"></i><i className="fa fa-star"></i><i className="fa fa-star"></i><i
                                                          className="fa fa-star"></i><i className="fa fa-star"></i> 01</a></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                                  <div className="review_list">
                                      <div className="review_item">
                                          <div className="media">
                                              <div className="d-flex">
                                                  <img src="src/assets/img/product/review-1.png" alt=""/>
                                              </div>
                                              <div className="media-body">
                                                  <h4>Blake Ruiz</h4>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                              </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                              commodo</p>
                                      </div>
                                      <div className="review_item">
                                          <div className="media">
                                              <div className="d-flex">
                                                  <img src="src/assets/img/product/review-2.png" alt=""/>
                                              </div>
                                              <div className="media-body">
                                                  <h4>Blake Ruiz</h4>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                              </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                              commodo</p>
                                      </div>
                                      <div className="review_item">
                                          <div className="media">
                                              <div className="d-flex">
                                                  <img src="src/assets/img/product/review-3.png" alt=""/>
                                              </div>
                                              <div className="media-body">
                                                  <h4>Blake Ruiz</h4>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                                  <i className="fa fa-star"></i>
                                              </div>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                              commodo</p>
                                      </div>
                                  </div>
                              </div>
                              <div className="col-lg-6">
                                  <div className="review_box">
                                      <h4>Add a Review</h4>
                                      <p>Your Rating:</p>
                                      <ul className="list">
                                          <li><a href="#"><i className="fa fa-star"></i></a></li>
                                          <li><a href="#"><i className="fa fa-star"></i></a></li>
                                          <li><a href="#"><i className="fa fa-star"></i></a></li>
                                          <li><a href="#"><i className="fa fa-star"></i></a></li>
                                          <li><a href="#"><i className="fa fa-star"></i></a></li>
                                      </ul>
                                      <p>Outstanding</p>
                                      <form className="row contact_form" action="contact_process.php" method="post" id="contactForm" noValidate>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <input type="text" className="form-control" id="name" name="name" placeholder="Your Full name"/>
                                              </div>
                                          </div>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <input type="email" className="form-control" id="email" name="email" placeholder="Email Address"/>
                                              </div>
                                          </div>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <input type="text" className="form-control" id="number" name="number" placeholder="Phone Number" />
                                              </div>
                                          </div>
                                          <div className="col-md-12">
                                              <div className="form-group">
                                                  <textarea className="form-control" name="message" id="message" rows={1} placeholder="Review"></textarea>
                                              </div>
                                          </div>
                                          <div className="col-md-12 text-right">
                                              <button type="submit" value="submit" className="primary-btn">Submit Now</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
	
        <section className="related-product-area section_gap_bottom">
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-lg-6 text-center">
                        <div className="section-title">
                            <h1>Deals of the Week</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-lg-9">
                        <div className="row">
                            <div className="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r1.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r2.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r3.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r5.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r6.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r7.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r9.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r10.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-4 col-sm-6">
                                <div className="single-related-product d-flex">
                                    <a href="#"><img src="src/assets/img/r11.jpg" alt=""/></a>
                                    <div className="desc">
                                        <a href="#" className="title">Black lace Heels</a>
                                        <div className="price">
                                            <h6>$189.00</h6>
                                            <h6 className="l-through">$210.00</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-3">
                        <div className="ctg-right">
                            <a href="#" target="_blank">
                                <img className="img-fluid d-block mx-auto" src="src/assets/img/category/c5.jpg" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Footer/>
    </div>
  )
}

export default DetailPage