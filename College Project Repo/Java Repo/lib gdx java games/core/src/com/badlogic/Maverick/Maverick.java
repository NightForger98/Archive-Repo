package com.badlogic.Maverick;

import com.badlogic.gdx.Game;
import com.badlogic.gdx.graphics.g2d.BitmapFont;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;

public class Maverick extends Game{
	public SpriteBatch batch;
	public BitmapFont font;

public void create() {
	batch = new SpriteBatch();
	font = new BitmapFont(); // use libGDX's default Arial font
	this.setScreen(new MainMenuScn(this));
}
public void render() {
	super.render(); // important!
}

public void dispose() {
	batch.dispose();
	font.dispose();
}

}


