<div class="nfl_container">
    <div class="row text-center">
        <h1>Welcome to the NFL teams page</h1>
    </div>
    <div class="row text-center mb-5">
        <img class="nfl_logo" src="<?php echo WP_NFL_TEAMS_URL . 'img/nfl_logo.png'; ?>">
    </div>
    <?php if($context['showFilter'] == 'Yes'): ?>
    <form method="post" class="form">
        <div class="row mt-3 mb-5">
            <div class="col-md-3 col-sm-12 form-group">
                <label>Filter</label>
                <select name="division" class="form-control">
                    <option value="All" <?php echo isset($context['post']['division']) && $context['post']['division'] == 'All' ? 'selected' : ''?>>All Divisions</option>
                    <option value="North" <?php echo isset($context['post']['division']) && $context['post']['division'] == 'North' ? 'selected' : ''?>>North</option>
                    <option value="South" <?php echo isset($context['post']['division']) && $context['post']['division'] == 'South' ? 'selected' : ''?>>South</option>
                    <option value="East" <?php echo isset($context['post']['division']) && $context['post']['division'] == 'East' ? 'selected' : ''?>>East</option>
                    <option value="West" <?php echo isset($context['post']['division']) && $context['post']['division'] == 'West' ? 'selected' : ''?>>West</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-12 form-group">
                <label>&nbsp;</label>
                <select name="conference" class="form-control">
                    <option value="All" <?php echo isset($context['post']['conference']) && $context['post']['conference'] == 'All' ? 'selected' : ''?>>All Conferences</option>
                    <option value="National_Football_Conference" <?php echo isset($context['post']['conference']) && $context['post']['conference'] == 'National_Football_Conference' ? 'selected' : ''?>>National Football Conference</option>
                    <option value="American_Football_Conference" <?php echo isset($context['post']['conference']) && $context['post']['conference'] == 'American_Football_Conference' ? 'selected' : ''?>>American Football Conference</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-12 form-group">
                <label>Order</label>
                <select name="order" class="form-control">
                    <option value="No" <?php echo isset($context['post']['order']) && $context['post']['order'] == 'No' ? 'selected' : ''?>>No order</option>
                    <option value="Asc" <?php echo isset($context['post']['order']) && $context['post']['order'] == 'Asc' ? 'selected' : ''?>>Asc</option>
                    <option value="Desc" <?php echo isset($context['post']['order']) && $context['post']['order'] == 'Desc' ? 'selected' : ''?>>Desc</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-12">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary mb-2 form-control">Submit</button>
            </div>
        </div>
    </form>
    <?php endif; ?>
    <div class="row">
        <?php foreach($context['teams'] as $team):
        if($team['conference'] == 'National Football Conference'){
            $img_name = 'nfc.png';
        } else {
            $img_name = 'afc.png';
        }
        ?>
        <div class="col-lg-3 col-md-6 col-sm-1 mb-3">
            <div class="card">
                <div class="nfl_id"><?php echo $team['id']; ?></div>
                <div class="card-body">
                    <div class="row" style="margin-top: 20px">
                        <div class="col-6">
                            <h2 class="card-title"><?php echo $team['display_name']; ?></h2>
                            <h3><?php echo $team['nickname']; ?></h3>
                            <p class="card-text"><?php echo $team['name']; ?></p>
                        </div>
                        <div class="col-6">
                            <img class="nfl_conference_image" src="<?php echo WP_NFL_TEAMS_URL . 'img/' . $img_name; ?>" alt="<?php echo $team['conference']; ?>">
                            <h4 class="text-center"><?php echo $team['conference']; ?></h4>
                        </div>
                    </div>
                    <div class="text-center w-100 nfl_division_text">
                        <?php echo $team['division']; ?> Division
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>