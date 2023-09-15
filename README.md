# JWM Theme

This project is a clone of a template I developed for a client a few months ago (which in turn, is derived from a template I made a few years ago, to implement with different clients). It is created from scratch (for obvious privacy reasons, I have replaced the client's logos, images, trademarks, text content, etc. and replaced it with generic information).

## Introduction

This template has dependencies on the ACF Pro plugin (Advanced Custom Fields Pro) which is how I usually handle custom fields in some of the pages (usually custom post types that are usually created "in series", such as team, testimonials, directory, case studies, and that kind of content that usually have the information formatted). For blog, internal pages (such as who we are, history, mission, vision, etc.), I usually use Gutenberg (sometimes I create custom blocks to include them within the content of these content pages). Gutenberg can be a bit complex for end-customer administration, but in terms of performance it is much better than any block system created by some third party.

## General technical aspects

As I mentioned in previous lines, I use ACF and CPT as base plugins for the creation of the internal content structures of the site. All the styling code is done from SCSS and I use the Live Sass Compiler extension of Visual Studio Code to generate the CSS files. I prefer to use Vanilla JS for the site requirements, but this template has Slick Slider installed (something I installed in the first version of this template I made about three years ago) which has a dependency on jQuery, so it is likely that you will find some legacy jQuery code that I have not yet finished removing.

## Technical description

This template is supported for PHP 8.1 without generating any kind of errors or warnings.

### Thank you very much