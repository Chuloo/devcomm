import React, { Component } from 'react';
import { Navbar, Jumbotron, UserGrid } from '../components';
import { constants } from '../config';
import { Redirect } from 'react-router-dom';

export default class Home extends Component {
	constructor(props) {
		super(props);
		this.state = { };
	}

	render() {
		let user = JSON.parse(localStorage.getItem('user'));
		if (user.alias == null) {
			return <Redirect to='/profile/edit'/>
		}
		let state = this.props.match.params.state;
		if(state==null) state = user.location
		return (
			<div id='landing'>
				<Navbar renderOnHome={true}/>
				<Jumbotron text={constants.JUMBOTRON_TEXT}/>
				<div className='user-grid-container'>
					<UserGrid state={state}/>
				</div>
			</div>
		);
	}
}