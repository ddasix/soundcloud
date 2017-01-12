import React from './node_modules/react';
import ReactDom from './node_modules/react-dom';
import { SoundPlayerContainer } from './node_modules/react-soundplayer/addons';
import { Icons } from './node_modules/react-soundplayer/components';
import { Timer } from './node_modules/react-soundplayer/lib/components/Timer';


const clientId = 'e12da13ef16b1aaae780ac9b584b0a27';
const resolveUrl = 'https://soundcloud.com/hiliterecords/paloalto-turtle-ship-remix-2-feat-huckleberry-p-reddy-sway-d';
const {
    SoundCloudLogoSVG,
    PlayIconSVG,
    PauseIconSVG,
    NextIconSVG,
    PrevIconSVG
} = Icons

class CustomPlayer extends React.Component {
    play() {
        let { soundCloudAudio, playing } = this.props;
        if (playing) {
            soundCloudAudio.pause();
        } else {
            soundCloudAudio.play();
        }
    }

    render() {
        let { track, playing, duration, currentTime } = this.props;

        if (!track) {
            return <div>Loading...</div>;
        }

        return (
            <div>
                <div className="close-float-player">
        			<img className="player-cover-img" src="https://i1.sndcdn.com/artworks-000168339665-09u3lc-t200x200.jpg" />
        			<div className="float-player-track-info">
        				<p className="float-player-track-title">{track.title}</p>
        				<p className="float-player-track-artist">{track.user.username}</p>
        			</div>
        			<div className="float-player-close-btn"></div>
		        </div>
                <button className="play-button" onClick={this.play.bind(this)}>
                    {playing ? 'Pause' : 'Play'}
                </button>
                <Timer
                    className="timer"
                    duration={parseInt(duration)}
                    currentTime={parseInt(currentTime)}
                />
            </div>
        );
    }
}

class App extends React.Component {
    render() {
        return (
            <SoundPlayerContainer resolveUrl={resolveUrl} clientId={clientId}>
                <CustomPlayer />
            </SoundPlayerContainer>
        );
    }
}

ReactDom.render(<App />, document.getElementById('container'));