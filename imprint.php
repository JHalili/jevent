<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Source code of Campus Events">
    <meta name="author" content="Joana Halili AND Rubin Deliallisi">
    <title>Campus Event</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?php include_once("analyticstracking.php") ?>
  <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Campus Event</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#about">Groups</a></li>
                    <li><a href="#contact">Sources</a></li>
                </ul>
                <div class="col-sm-3 col-md-3">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="q">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Profile</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Create Group</a></li>
                            <li><a href="#">Manage Groups</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Log Out</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Report Problem</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <h1>Imprint</h1>
                <div class="impressum">
                    <p>According to § 5 TMG</p>
                    <p>
                        Rubin Deliallisi
                        <br> College Ring 4
                        <br> 28759 Bremen
                        <br>
                    </p>
                    <p>
                        <strong>Site Administrators: </strong>
                        <br> Joana Halili
                        <br> Rubin Deliallisi
                        <br>
                    </p>
                    <p><strong>Contact:</strong>
                        <br>
                        Joana Halili
                        <br> E-Mail: <a href="mailto:webmaster@everyone.wtf">j.halili@jacobs-university.de</a>
                        <br>
                        Rubin Deliallisi
                        <br> E-Mail: <a href="mailto:webmaster@everyone.wtf">r.deliallisi@jacobs-university.de</a>
                        <br>
                    </p>
                    <p><strong>Disclaimer of liability:</strong>
                        <br><strong>Liability for content</strong>
                        <br>
                        <br> The contents of our pages were created with great care. However, we can not guarantee the correctness, completeness and actuality of the contents. As a service provider, we are responsible for our own content on these pages according to the general laws according to § 7 Abs.1 TMG. According to §§ 8 to 10 TMG, however, we as service providers are not obliged to monitor transmitted or stored third-party information or to investigate circumstances which indicate an illegal activity. Obligations to remove or block the use of information according to general laws remain unaffected. Liability in this respect, however, is only possible from the time of knowledge of a concrete infringement. If we become aware of any such infringements, we will immediately remove such content.
                        <br>
                        <br><strong>Liability for links</strong>
                        <br>
                        <br>Our site contains links to external websites of third parties on whose contents we have no influence. Therefore, we can not assume any liability for these third-party contents. The respective provider or operator of the pages is always responsible for the content of the linked pages. The linked pages were checked for possible legal violations at the time of linking. Illegal contents were not recognizable at the time of linking. However, a permanent control of the content of the linked pages is not reasonable without concrete indications of an infringement. If we become aware of legal violations, we will immediately remove such links.
                        <br>
                        <br><strong>Copyright</strong>
                        <br>
                        <br> The content and works created by the site operators on these pages are subject to German copyright law. The copying, processing, distribution and any kind of exploitation outside the limits of copyright require the written consent of the respective author or creator. Downloads and copies of this page are only permitted for private, non-commercial use. Insofar as the content on this site has not been created by the operator, the copyrights of third parties are respected. In particular contents of third parties are marked as such. If you are nevertheless aware of a copyright infringement, we ask for a corresponding note. If we become aware of legal violations, we will immediately remove such content.</p>
                    <br>
                </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div>
    <footer class="bs-footer" role="contentinfo">
        <div class="container">
            <p>jevent.tk © 2016 <a href="imprint.php">Imprint</a>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
