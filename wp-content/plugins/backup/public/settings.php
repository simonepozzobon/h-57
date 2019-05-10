<?php
require_once(dirname(__FILE__).'/boot.php');
require_once(SG_PUBLIC_INCLUDE_PATH . '/header.php');
$isNotificationEnabled = SGConfig::get('SG_NOTIFICATIONS_ENABLED');
$userEmail = SGConfig::get('SG_NOTIFICATIONS_EMAIL_ADDRESS');
$isDeleteBackupAfterUploadEnabled = SGConfig::get('SG_DELETE_BACKUP_AFTER_UPLOAD');
$isDeleteBackupFromCloudEnabled = SGConfig::get('SG_DELETE_BACKUP_FROM_CLOUD');
$isDisabelAdsEnabled = SGConfig::get('SG_DISABLE_ADS');
$isAlertBeforeUpdateEnabled = SGConfig::get('SG_ALERT_BEFORE_UPDATE');
$isShowStatisticsWidgetEnabled = SGConfig::get('SG_SHOW_STATISTICS_WIDGET');
$isReloadingsEnabled = SGConfig::get('SG_BACKUP_WITH_RELOADINGS');
$intervalSelectElement = array(
                            '1000'=>'1 second',
                            '2000'=>'2 seconds',
                            '3000'=>'3 seconds',
                            '5000'=>'5 seconds',
                            '7000'=>'7 seconds',
                            '10000'=>'10 seconds');
$selectedInterval = (int)SGConfig::get('SG_AJAX_REQUEST_FREQUENCY')?(int)SGConfig::get('SG_AJAX_REQUEST_FREQUENCY'):SG_AJAX_DEFAULT_REQUEST_FREQUENCY;

$backupFileNamePrefix = SGConfig::get('SG_BACKUP_FILE_NAME_PREFIX')?SGConfig::get('SG_BACKUP_FILE_NAME_PREFIX'):SG_BACKUP_FILE_NAME_DEFAULT_PREFIX;
$backupFileNamePrefix = esc_html($backupFileNamePrefix);

$sgBackgroundReloadMethod = SGConfig::get('SG_BACKGROUND_RELOAD_METHOD');
$ftpPassiveMode = SGConfig::get('SG_FTP_PASSIVE_MODE');
?>
<?php require_once(SG_PUBLIC_INCLUDE_PATH . 'sidebar.php'); ?>
    <div id="sg-content-wrapper">
        <div class="container-fluid">
            <div class="row sg-settings-container">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" data-sgform="ajax" data-type="sgsettings">
                        <fieldset>
                            <legend><?php _backupGuardT('General settings')?><?php echo backupGuardLoggedMessage(); ?></legend>
                            <?php if (SGBoot::isFeatureAvailable('NOTIFICATIONS')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label sg-user-info">
                                        <?php _backupGuardT('Email notifications'); ?>
                                        <?php if(!empty($userEmail)): ?>
                                            <br/><span class="text-muted sg-user-email sg-helper-block"><?php echo esc_html($userEmail); ?></span>
                                        <?php endif?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="sgIsEmailNotification" class="sg-switch sg-email-switch" sgFeatureName="NOTIFICATIONS" <?php echo $isNotificationEnabled?'checked="checked"':''?> data-remote="settings">
                                        </label>
                                    </div>
                                </div>
                                <div class="sg-general-settings">
                                    <div class="form-group">
                                        <label class="col-md-4 sg-control-label" for="sg-email"><?php _backupGuardT('Enter email')?></label>
                                        <div class="col-md-8">
                                            <input id="sg-email" name="sgUserEmail" type="text" placeholder="<?php _backupGuardT('You can enter multiple emails, just separate them with comma')?>" class="form-control input-md" value="<?php echo @$userEmail?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label class="col-md-8 sg-control-label">
                                    <?php _backupGuardT('Reloads enabled'); ?>
                                </label>
                                <div class="col-md-3 pull-right text-right">
                                    <label class="sg-switch-container">
                                        <input type="checkbox" name="backup-with-reloadings" class="sg-switch" <?php echo $isReloadingsEnabled?'checked="checked"':''?>>
                                    </label>
                                </div>
                            </div>
                            <?php if (SGBoot::isFeatureAvailable('DELETE_LOCAL_BACKUP_AFTER_UPLOAD')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label">
                                        <?php _backupGuardT('Delete local backup after upload'); ?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="delete-backup-after-upload" sgFeatureName="DELETE_LOCAL_BACKUP_AFTER_UPLOAD" class="sg-switch" <?php echo $isDeleteBackupAfterUploadEnabled?'checked="checked"':''?>>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (SGBoot::isFeatureAvailable('ALERT_BEFORE_UPDATE')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label">
                                        <?php _backupGuardT('Alert before update'); ?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="alert-before-update" sgFeatureName="ALERT_BEFORE_UPDATE" class="sg-switch" <?php echo $isAlertBeforeUpdateEnabled?'checked="checked"':''?>>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (SGBoot::isFeatureAvailable('BACKUP_DELETION_WILL_ALSO_DELETE_FROM_CLOUD')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label">
                                        <?php _backupGuardT('Backup deletion will also delete from cloud'); ?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="delete-backup-from-cloud" sgFeatureName="BACKUP_DELETION_WILL_ALSO_DELETE_FROM_CLOUD" class="sg-switch" <?php echo $isDeleteBackupFromCloudEnabled?'checked="checked"':''?>>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label class="col-md-8 sg-control-label">
                                    <?php _backupGuardT('Show statistics'); ?>
                                </label>
                                <div class="col-md-3 pull-right text-right">
                                    <label class="sg-switch-container">
                                        <input type="checkbox" name="show-statistics-widget" class="sg-switch" <?php echo $isShowStatisticsWidgetEnabled?'checked="checked"':''?>>
                                    </label>
                                </div>
                            </div>
                            <?php if (SGBoot::isFeatureAvailable('FTP')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label">
                                        <?php _backupGuardT('FTP passive mode'); ?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="ftp-passive-mode" sgFeatureName="FTP" class="sg-switch" <?php echo $ftpPassiveMode?'checked="checked"':''?>>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (SGBoot::isFeatureAvailable('MULTI_SCHEDULE')): ?>
                                <div class="form-group">
                                    <label class="col-md-8 sg-control-label">
                                        <?php _backupGuardT('Disable ads'); ?>
                                    </label>
                                    <div class="col-md-3 pull-right text-right">
                                        <label class="sg-switch-container">
                                            <input type="checkbox" name="sg-hide-ads" sgFeatureName="HIDE_ADS" class="sg-switch" <?php echo $isDisabelAdsEnabled?'checked="checked"':''?>>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="col-md-5 sg-control-label" for='sg-paths-to-exclude'><?php _backupGuardT("Exclude paths (separated by commas)")?></label>
                                <div class="col-md-5 pull-right text-right">
                                    <input class="form-control" id='sg-paths-to-exclude' name='sg-paths-to-exclude' type="text" value="<?php echo SGConfig::get('SG_PATHS_TO_EXCLUDE')?SGConfig::get('SG_PATHS_TO_EXCLUDE'):''?>" placeholder="e.g. wp-content/cache, wp-content/w3tc-cache">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 sg-control-label" for='sg-tables-to-exclude'><?php _backupGuardT("Tables to exclude (separated by commas)")?></label>
                                <div class="col-md-5 pull-right text-right">
                                    <input class="form-control" id='sg-tables-to-exclude' name='sg-tables-to-exclude' type="text" value="<?php echo SGConfig::get('SG_TABLES_TO_EXCLUDE')?SGConfig::get('SG_TABLES_TO_EXCLUDE'):''?>" placeholder="e.g. wp_comments, wp_commentmeta">
                                </div>
                            </div>

                            <?php if (SGBoot::isFeatureAvailable('NUMBER_OF_BACKUPS_TO_KEEP')): ?>
                                <div class="form-group">
                                    <label class="col-md-5 sg-control-label" for='amount-of-backups-to-keep'><?php _backupGuardT("Backup retention")?>
                                    </label>
                                    <div class="col-md-5 pull-right text-right">
                                        <input class="form-control" id='amount-of-backups-to-keep' name='amount-of-backups-to-keep' type="text" value="<?php echo (int)SGConfig::get('SG_AMOUNT_OF_BACKUPS_TO_KEEP')?(int)SGConfig::get('SG_AMOUNT_OF_BACKUPS_TO_KEEP'):SG_NUMBER_OF_BACKUPS_TO_KEEP?>" <?php echo (!SGBoot::isFeatureAvailable('NUMBER_OF_BACKUPS_TO_KEEP'))? 'disabled' : '' ?>>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label class="col-md-5 sg-control-label" for='sg-number-of-rows-to-backup'><?php _backupGuardT("Number of rows to backup at once")?></label>
                                <div class="col-md-5 pull-right text-right">
                                    <input class="form-control" id='sg-number-of-rows-to-backup' name='sg-number-of-rows-to-backup' type="text" value="<?php echo (int)SGConfig::get('SG_BACKUP_DATABASE_INSERT_LIMIT')?(int)SGConfig::get('SG_BACKUP_DATABASE_INSERT_LIMIT'):SG_BACKUP_DATABASE_INSERT_LIMIT?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 sg-control-label" for='sg-background-reload-method'><?php _backupGuardT("Reload method")?></label>
                                <div class="col-md-5 pull-right text-right">
                                    <select class="form-control" id='sg-background-reload-method' name='sg-background-reload-method'>
                                        <option value="<?php echo SG_RELOAD_METHOD_CURL ?>" <?php echo $sgBackgroundReloadMethod == SG_RELOAD_METHOD_CURL ? "selected" : "" ?> >Curl</option>
                                        <option value="<?php echo SG_RELOAD_METHOD_STREAM ?>" <?php echo $sgBackgroundReloadMethod == SG_RELOAD_METHOD_STREAM ? "selected" : "" ?> >Stream</option>
                                        <option value="<?php echo SG_RELOAD_METHOD_SOCKET ?>" <?php echo $sgBackgroundReloadMethod == SG_RELOAD_METHOD_SOCKET ? "selected" : "" ?> >Socket</option>
                                    </select>
                                </div>
                            </div>
                            <?php if (SGBoot::isFeatureAvailable('CUSTOM_BACKUP_NAME')): ?>
                                <div class="form-group">
                                    <label class="col-md-5 sg-control-label">
                                        <?php _backupGuardT('Backup file name')?>
                                    </label>
                                    <div class="col-md-5 pull-right text-right">
                                        <input id="backup-file-name" name="backup-file-name" type="text" class="form-control input-md" value="<?php echo $backupFileNamePrefix?>" <?php echo (!SGBoot::isFeatureAvailable('CUSTOM_BACKUP_NAME'))? 'disabled' : '' ?>>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="col-md-7 sg-control-label" for="sg-email"><?php _backupGuardT('AJAX request frequency')?></label>
                                <div class="col-md-5">
                                    <?php echo selectElement($intervalSelectElement, array('id'=>'sg-ajax-interval', 'name'=>'ajaxInterval', 'class'=>'form-control'), '', $selectedInterval);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5"><?php _backupGuardT('Backup destination path'); ?></label>
                                <div class="col-md-6 pull-right text-right">
                                    <span><?php echo str_replace(realpath(SG_APP_ROOT_DIRECTORY).'/', "" ,realpath(SG_BACKUP_DIRECTORY)); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="button1id"></label>
                                <div class="col-md-8">
                                    <button type="button" id="sg-save-settings" class="btn btn-success pull-right" onclick="sgBackup.sgsettings();"><?php _backupGuardT('Save')?></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once(SG_PUBLIC_INCLUDE_PATH . '/footer.php'); ?>
    </div>
