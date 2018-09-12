/**
 * Paths
 *
 * Project related paths.
 */

const path = require( 'path' );
const fs = require( 'fs' );

// Make sure any symlinks in the project folder are resolved:
const pluginDir = fs.realpathSync( process.cwd() );
const resolveApp = relativePath => path.resolve( pluginDir, relativePath );

// Config after eject: we're in ./config/
module.exports = {
	dotenv: resolveApp( '.env' ),
	pluginBlocksJs: resolveApp( 'blocks/blocks.js' ),
	yarnLockFile: resolveApp( 'yarn.lock' ),
	pluginDest: resolveApp( '.' ), // We are in ./assets folder already so the path '.' resolves to ./assets/.
};
