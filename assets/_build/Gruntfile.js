module.exports = function(grunt) {

    //auto load task modules.
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    //configurations.
    grunt.initConfig({

        //Read the package.json (optional)
        pkg: grunt.file.readJSON('package.json'),


        //meta configuations
        meta: {

            //base path
            base_path: '../',

            //source paths
            source_path: '<%= meta.base_path %>src/',
            source_sass_path: '<%= meta.source_path %>sass/',
            source_javascript_path: '<%= meta.source_path %>javascripts/',

            //assets paths
            assets_path: '<%= meta.base_path %>',
            assets_stylesheet_path: '<%= meta.assets_path %>css/',
            assets_javascript_path: '<%= meta.assets_path %>javascripts/',

            //after merge of The Javascript file name
            javascript_name: 'javascript',

        },

        //banner infomation
        banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
                '* Copyright (c) <%= grunt.template.today("yyyy") %> by Repar Software LLC (http://www.56hm.com) All rights reserved.  */',

        //sass task configuration
        sass: {
          options:{
              compass: true
          },
          dev: {
              files: {
                  '<%= meta.assets_stylesheet_path %>redirect.css': '<%= meta.source_sass_path %>bootstrap.scss'
              }
          },

          prod: {
              files: {
                  '<%= meta.assets_stylesheet_path %>redirect.min.css': '<%= meta.source_sass_path %>bootstrap.scss'
              },
              options: {
                  style: 'compressed'
              }
          }
        },

        //concat task configuration
        concat:
        {
           options: {
              banner: '<%= banner %>',
              sourceMap: true        
           },
            
           assets: {
                
               src: [
                 '<%= meta.source_javascript_path %>**/*.js'
               ],
               
               dest : '<%= meta.assets_javascript_path %><%= meta.javascript_name %>.js'

           }
        },


        //uglify task configuration
        uglify:
        {
            options: {
                banner: '<%= banner %>',
                preserveComments: false,
                expand: true,
                sourceMap: true,
            },

            assets: {

              files: {
                  '<%= meta.assets_javascript_path %><%= meta.javascript_name %>.min.js': ['<%= concat.assets.dest %>']
              }
            }
         },


        //watch task configuration
        watch: {
          sass: {
            files: [
                '<%= meta.source_sass_path %>**/*.scss'
            ],
            tasks: ['sass']
          },

          uglify:{
            files: [
                '<%= meta.source_javascript_path %>**/*.js'
            ],
            tasks: ['concat','uglify'] 
          }
        }
    });

    // Default task.
    //grunt.registerTask('default', ['sass']);
};