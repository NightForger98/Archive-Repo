package com.badlogic.snakeGame;


import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Screen;
import com.badlogic.gdx.graphics.OrthographicCamera;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.utils.ScreenUtils;

public class MainMenu implements Screen {
	final Snake game;
	 Texture MapImage;
	OrthographicCamera camera;

	public MainMenu(final Snake game) {
		this.game = game;

		camera = new OrthographicCamera();
		camera.setToOrtho(false, 800, 480);
		MapImage = new Texture(Gdx.files.internal("snkmap.png"));
	}
	public void create() {
		//MapImage = new Texture(Gdx.files.internal("snkmap.png"));
	}
	@Override
	public void render(float delta) {
		ScreenUtils.clear(0, 1, 0.2f, 1);

		camera.update();
		game.batch.setProjectionMatrix(camera.combined);

		game.batch.begin();
		game.batch.draw(MapImage,0,0);
		//game.batch.draw( MapImage,800,480);
		game.font.draw(game.batch, "Snake ", 100, 200);
		game.font.draw(game.batch, "Tap to Slither!", 100, 100);
		game.batch.end();
		

		if (Gdx.input.isTouched()) {
			game.setScreen(new SnkGmScreen(game));
			dispose();
		}
	}
	@Override
	public void show() {
		
		// TODO Auto-generated method stub
		
	}
	@Override
	public void resize(int width, int height) {
		// TODO Auto-generated method stub
		
	}
	@Override
	public void pause() {
		// TODO Auto-generated method stub
		
	}
	@Override
	public void resume() {
		// TODO Auto-generated method stub
		
	}
	@Override
	public void hide() {
		// TODO Auto-generated method stub
		
	}
	@Override
	public void dispose() {
		MapImage.dispose();
		// TODO Auto-generated method stub
		
	}

}
