var elixir = require('laravel-elixir');
var liveReload = require('gulp-livereload');
var clean = require('rimraf');
var gulp = require('gulp');

var config = {
    assets_path: './resources/assets',
    build_path: './public/build'
};

config.bower_path = config.assets_path + '/../bower_components';

//JS
config.build_path_js = config.build_path + '/js';
config.build_vendor_path_js = config.build_path_js + '/vendor';
config.vendor_path_js = [
    config.bower_path + '/jquery/dist/jquery.min.js',
    config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
    config.bower_path + '/angular/angular.min.js',
    config.bower_path + '/angular/locale/angular-locale_pt-br.js',
    config.bower_path + '/angular-route/angular-route.min.js',
    config.bower_path + '/angular-resource/angular-resource.min.js',
    config.bower_path + '/angular-animate/angular-animate.min.js',
    config.bower_path + '/angular-messages/angular-messages.min.js',
    config.bower_path + '/angular-bootstrap/ui-bootstrap-tpls.min.js',
    config.bower_path + '/angular-strap/dist/modules/navbar.min.js',
    config.bower_path + '/angular-cookies/angular-cookies.min.js',
    config.bower_path + '/angular-oauth2/dist/angular-oauth2.min.js',
    config.bower_path + '/query-string/query-string.js',
    config.bower_path + '/ng-dialog/js/ngDialog.min.js',
    config.bower_path + '/ng-file-upload/ng-file-upload.min.js'
];
gulp.task('copy-scripts', function () {
    gulp.src([
            config.assets_path + '/js/**/*.js'
        ])
        .pipe(gulp.dest(config.build_path_js))
        .pipe(liveReload());

    gulp.src(config.vendor_path_js)
        .pipe(gulp.dest(config.build_vendor_path_js))
        .pipe(liveReload());
});

//CSS
config.build_path_css = config.build_path + '/css';
config.build_vendor_path_css = config.build_path_css + '/vendor';
config.vendor_path_css = [
    config.bower_path + '/bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap-theme.min.css',
    config.bower_path + '/ng-dialog/css/ngDialog.min.css',
    config.bower_path + '/ng-dialog/css/ngDialog-theme-default.css'
];
gulp.task('copy-styles', function () {
    gulp.src([
            config.assets_path + '/css/**/*.css'
        ])
        .pipe(gulp.dest(config.build_path_css))
        .pipe(liveReload());

    gulp.src(config.vendor_path_css)
        .pipe(gulp.dest(config.build_vendor_path_css))
        .pipe(liveReload());
});

//FONTS
config.build_path_font = config.build_path + '/fonts';
gulp.task('copy-fonts', function () {
    gulp.src([
            config.assets_path + '/fonts/**/*'
        ])
        .pipe(gulp.dest(config.build_path_font))
        .pipe(liveReload());

});

//IMAGES
config.build_path_image = config.build_path + '/images';
gulp.task('copy-images', function () {
    gulp.src([
            config.assets_path + '/images/**/*'
        ])
        .pipe(gulp.dest(config.build_path_image))
        .pipe(liveReload());

});

//HTML
config.build_path_html = config.build_path + '/views';
gulp.task('copy-html', function () {
    gulp.src([
            config.assets_path + '/js/views/**/*.html'
        ])
        .pipe(gulp.dest(config.build_path_html))
        .pipe(liveReload());

});

//Tarefa para ficar verificando modificações nos arquivos
gulp.task('watch-dev', ['clear-folder'], function () {
    liveReload.listen();
    gulp.start('copy-styles', 'copy-scripts', 'copy-html', 'copy-fonts', 'copy-images');
    gulp.watch(config.assets_path + '/**', ['copy-styles', 'copy-scripts', 'copy-html', 'copy-fonts', 'copy-images']);
});

//Tarefa que limpa a pasta build
gulp.task('clear-folder', function () {
    clean.sync(config.build_path);
});

//Tarefa para gerar arquivos de produção
gulp.task('default', ['clear-folder'], function () {
    gulp.start('copy-html', 'copy-fonts', 'copy-images');
    elixir(function (mix) {
        mix.styles(config.vendor_path_css.concat([config.assets_path + '/css/**/*.css']),
            'public/css/all.css', config.assets_path);

        mix.scripts(config.vendor_path_js.concat([config.assets_path + '/js/**/*.js']),
            'public/js/all.js', config.assets_path);

        mix.version(['js/all.js', 'css/all.css']);
    });
});
