"use strict";

var gulp = require("gulp");

var sass = require("gulp-sass");
var concat = require("gulp-concat");
var imagemin = require("gulp-imagemin");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");

var plumberErrorHandler = {
  errorHandler: notify.onError({
    title: "Gulp",
    message: "Error: <%= error.message %>",
  }),
};

const styles = () => {
  return gulp
    .src("../jaydi_jewerly/scss/*.scss")
    .pipe(plumber(plumberErrorHandler))
    .pipe(sass())
    .pipe(gulp.dest("../jaydi_jewerly/css"));
};

const scripts = () => {
  return gulp
    .src("../jaydi_jewerly/js/*.js")
    .pipe(concat("main.js"))
    .pipe(gulp.dest("../jaydi_jewerly/js"));
};

const images = () => {
  return gulp
    .src("../jaydi_jewerly/img/*.{png,jpg,gif}")
    .pipe(
      imagemin({
        optimizationLevel: 7,
        progressive: true,
      })
    )
    .pipe(gulp.dest("../jaydi_jewerly/img"));
};

const watch = () => {
  gulp.watch("../jaydi_jewerly/scss/*.scss", styles);
  gulp.watch("../jaydi_jewerly/js/*.js", scripts);
  gulp.watch("../jaydi_jewerly/img/*.{png,jpg,gif}", images);
}

gulp.task("default", gulp.parallel(styles, scripts, images, watch));
