module.exports = function(grunt) {
 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
		watch: {
			scripts: {
				files: ['dev/js/*'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},
			css: {
				files: ['dev/css/*.scss'],
				tasks: ['sass'],
				options: {
					spawn: false,
				}
			},
			image: {
				files: ['dev/images/*.{png,jpg,gif}'],
				tasks: ['imagemin'],
				options: {
					spawn: false,
				}
			}
		},
		concat: {   
			dist: {
				src: [
					'dev/js/libs/*.js', // All JS in the libs folder
                    'dev/js/global.js'  // This specific file
				],
				dest: 'includes/js/main.js',
				
			}
		},
		uglify: {
			build: {
				src: 'includes/js/main.js',
				dest: 'includes/js/main.min.js'
			}
		}, 
		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'dev/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'includes/images/'
				}]
			}
		},
		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'includes/css/global.css': 'dev/css/global.scss'
				}
			} 
		},
		/*
		deploy: {
			liveservers: {
				options:{
					servers: [{
					host: '123.123.123.12',
					port: 22,
					username: 'username',
					password: 'password'
				}],
					cmds_before_deploy: ["some cmds you may want to exec before deploy"],
					cmds_after_deploy: ["forever restart", "some other cmds you want to exec after deploy"],
					deploy_path: 'your deploy path in server'
				}
			}
		},
		gitcommit: {
			your_target: {
				options: {
					cwd: "/path/to/repo"
				},
				files: [
					{
						src: ["fileone.txt", "filetwo.js"],
						expand: true,
						cwd: "/path/to/repo"
					}
				]
			}
		},
  	*/
    });

	grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');

	//grunt.loadNpmTasks('grunt-deploy');
	//grunt.loadNpmTasks('grunt-git');

	grunt.registerTask('default', ['watch']);
    // grunt.registerTask('default', ['watch', 'concat', 'sass', 'uglify', 'imagemin']);

};